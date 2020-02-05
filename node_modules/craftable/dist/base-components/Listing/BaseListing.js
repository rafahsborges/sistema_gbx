'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _moment = require('moment');

var _moment2 = _interopRequireDefault(_moment);

require('moment-timezone');

var _Pagination = require('./components/Pagination');

var _Pagination2 = _interopRequireDefault(_Pagination);

var _Sortable = require('./components/Sortable');

var _Sortable2 = _interopRequireDefault(_Sortable);

var _vTooltip = require('v-tooltip');

var _UserDetailTooltip = require('./components/UserDetailTooltip');

var _UserDetailTooltip2 = _interopRequireDefault(_UserDetailTooltip);

var _lodash = require('lodash');

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

Vue.directive('tooltip', _vTooltip.VTooltip);
Vue.directive('close-popover', _vTooltip.VClosePopover);
Vue.component('v-popover', _vTooltip.VPopover);

exports.default = {
    data: function data() {
        return {
            pagination: {
                state: {
                    per_page: this.$cookie.get('per_page') || 10, // required
                    current_page: 1, // required
                    last_page: 1, // required
                    from: 1,
                    to: 10 // required
                },
                options: {
                    alwaysShowPrevNext: true
                }
            },
            orderBy: {
                column: 'id',
                direction: 'asc'
            },
            filters: {},
            search: '',
            collection: null,
            now: (0, _moment2.default)().tz(this.timezone).format('YYYY-MM-DD HH:mm:ss'),
            datetimePickerConfig: {
                enableTime: true,
                time_24hr: true,
                enableSeconds: true,
                dateFormat: 'Y-m-d H:i:S',
                altInput: true,
                altFormat: 'd.m.Y H:i:S',
                locale: null,
                inline: true
            },
            bulkItems: {},
            bulkCheckingAllLoader: false,
            dummy: null
        };
    },
    props: {
        'url': {
            type: String,
            required: true
        },
        'data': {
            type: Object,
            default: function _default() {
                return null;
            }
        },
        'timezone': {
            type: String,
            required: false,
            default: function _default() {
                return "UTC";
            }
        },
        'trans': {
            required: false,
            default: function _default() {
                return {
                    duplicateDialog: {
                        title: 'Warning!',
                        text: 'Do you really want to duplicate this item?',
                        yes: 'Yes, duplicate.',
                        no: 'No, cancel.',
                        success_title: 'Success!',
                        success: 'Item successfully duplicated.',
                        error_title: 'Error!',
                        error: 'An error has occured.'
                    },
                    deleteDialog: {
                        title: 'Warning!',
                        text: 'Do you really want to delete this item?',
                        yes: 'Yes, delete.',
                        no: 'No, cancel.',
                        success_title: 'Success!',
                        success: 'Item successfully deleted.',
                        error_title: 'Error!',
                        error: 'An error has occured.'
                    }
                };
            }
        }
    },
    components: {
        'pagination': _Pagination2.default,
        'sortable': _Sortable2.default,
        'user-detail-tooltip': _UserDetailTooltip2.default
    },

    watch: {
        pagination: {
            handler: function handler() {
                this.dummy = Math.random();
            },
            deep: true
        }
    },

    created: function created() {
        if (this.data != null) {
            this.populateCurrentStateAndData(this.data);
        } else {
            this.loadData();
        }

        var _this = this;
        setInterval(function () {
            _this.now = (0, _moment2.default)().tz(_this.timezone).format('YYYY-MM-DD HH:mm:ss');
        }, 1000);
    },

    computed: {
        isClickedAll: {
            get: function get() {
                var dummy = this.dummy; //we hack pagination watcher don't recalculate computed property
                return this.clickedBulkItemsCount >= this.pagination.state.to - this.pagination.state.from + 1 && this.clickedBulkItemsCount > 0 && this.allClickedItemsAreSame();
            },
            set: function set(clicked) {}
        },
        clickedBulkItemsCount: function clickedBulkItemsCount() {
            return Object.values(this.bulkItems).filter(function (item) {
                return item === true;
            }).length;
        }
    },

    filters: {
        date: function date(date) {
            var format = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'YYYY-MM-DD';

            var date = (0, _moment2.default)(date);
            return date.isValid() ? date.format(format) : "";
        },
        datetime: function datetime(_datetime) {
            var format = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'YYYY-MM-DD HH:mm:ss';

            var date = (0, _moment2.default)(_datetime);
            return date.isValid() ? date.format(format) : "";
        },
        time: function time(_time) {
            var format = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'HH:mm:ss';

            // '2000-01-01' is here just because momentjs needs a date
            var date = (0, _moment2.default)('2000-01-01 ' + _time);
            return date.isValid() ? date.format(format) : "";
        }
    },

    methods: {
        allClickedItemsAreSame: function allClickedItemsAreSame() {
            var itemsInPaginationIds = Object.values(this.collection).map(function (_ref) {
                var id = _ref.id;
                return id;
            });

            //for loop is used because you can't return false in .forEach() method
            for (var i = 0; i < itemsInPaginationIds.length; i++) {
                var itemInPaginationId = itemsInPaginationIds[i];
                if (this.bulkItems[itemInPaginationId] === undefined || this.bulkItems[itemInPaginationId] === false) {
                    return false;
                }
            }

            return true;
        },
        onBulkItemClicked: function onBulkItemClicked(id) {
            this.bulkItems[id] === undefined ? Vue.set(this.bulkItems, id, true) : this.bulkItems[id] = !this.bulkItems[id];
        },
        onBulkItemsClickedAll: function onBulkItemsClickedAll(url) {
            var _this2 = this;

            var options = {
                params: {
                    bulk: true
                }
            };

            this.bulkCheckingAllLoader = true;
            Object.assign(options.params, this.filters);

            axios.get(url, options).then(function (response) {
                _this2.checkAllItems(response.data.bulkItems);
            }, function (error) {
                _this2.$notify({ type: 'error', title: 'Error!', text: error.response.data.message ? error.response.data.message : 'An error has occured.' });
            }).finally(function () {
                _this2.bulkCheckingAllLoader = false;
            });
        },
        onBulkItemsClickedAllWithPagination: function onBulkItemsClickedAllWithPagination() {
            var itemsInPagination = Object.values(this.collection).map(function (_ref2) {
                var id = _ref2.id;
                return id;
            });
            if (!this.isClickedAll) {
                this.bulkCheckingAllLoader = true;
                this.checkAllItems(itemsInPagination);
                this.bulkCheckingAllLoader = false;
            } else {
                this.onBulkItemsClickedAllUncheck(itemsInPagination);
            }
        },
        checkAllItems: function checkAllItems(itemsToCheck) {
            var _this3 = this;

            itemsToCheck.forEach(function (itemId) {
                Vue.set(_this3.bulkItems, itemId, true);
            });
        },
        onBulkItemsClickedAllUncheck: function onBulkItemsClickedAllUncheck() {
            var _this4 = this;

            var bulkItemsToUncheck = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

            if (bulkItemsToUncheck === null) {
                this.bulkItems = {};
            } else {
                Object.values(this.collection).map(function (_ref3) {
                    var id = _ref3.id;
                    return id;
                }).forEach(function (itemsInPaginationIds) {
                    _this4.bulkItems[itemsInPaginationIds] = false;
                });
            }
        },
        bulkDelete: function bulkDelete(url) {
            var _this5 = this;

            var itemsToDelete = (0, _lodash.keys)((0, _lodash.pickBy)(this.bulkItems));
            var self = this;

            this.$modal.show('dialog', {
                title: 'Warning!',
                text: 'Do you really want to delete ' + this.clickedBulkItemsCount + ' selected items ?',
                buttons: [{ title: 'No, cancel.' }, {
                    title: '<span class="btn-dialog btn-danger">Yes, delete.<span>',
                    handler: function handler() {
                        _this5.$modal.hide('dialog');
                        axios.post(url, {
                            data: {
                                'ids': itemsToDelete
                            }
                        }).then(function (response) {
                            self.bulkItems = {};
                            _this5.loadData();
                            _this5.$notify({ type: 'success', title: 'Success!', text: response.data.message ? response.data.message : 'Item successfully deleted.' });
                        }, function (error) {
                            _this5.$notify({ type: 'error', title: 'Error!', text: error.response.data.message ? error.response.data.message : 'An error has occured.' });
                        });
                    }
                }]
            });
        },
        loadData: function loadData(resetCurrentPage) {
            var _this6 = this;

            var options = {
                params: {
                    per_page: this.pagination.state.per_page,
                    page: this.pagination.state.current_page,
                    orderBy: this.orderBy.column,
                    orderDirection: this.orderBy.direction
                }
            };

            if (resetCurrentPage === true) {
                options.params.page = 1;
            }

            Object.assign(options.params, this.filters);

            axios.get(this.url, options).then(function (response) {
                return _this6.populateCurrentStateAndData(response.data.data);
            }, function (error) {
                // TODO handle error
            });
        },
        filter: function filter(column, value) {
            if (value == '') {
                delete this.filters[column];
            } else {
                this.filters[column] = value;
            }
            // when we change filter, we must reset pagination, because the total items count may has changed
            this.loadData(true);
        },
        populateCurrentStateAndData: function populateCurrentStateAndData(object) {

            if (object.current_page > object.last_page && object.total > 0) {
                this.pagination.state.current_page = object.last_page;
                this.loadData();
                return;
            }

            this.collection = object.data;
            this.pagination.state.current_page = object.current_page;
            this.pagination.state.last_page = object.last_page;
            this.pagination.state.total = object.total;
            this.pagination.state.per_page = object.per_page;
            this.pagination.state.to = object.to;
            this.pagination.state.from = object.from;
        },
        deleteItem: function deleteItem(url) {
            var _this7 = this;

            this.$modal.show('dialog', {
                title: 'Warning!',
                text: 'Do you really want to delete this item?',
                buttons: [{ title: 'No, cancel.' }, {
                    title: '<span class="btn-dialog btn-danger">Yes, delete.<span>',
                    handler: function handler() {
                        _this7.$modal.hide('dialog');
                        axios.delete(url).then(function (response) {
                            _this7.loadData();
                            _this7.$notify({ type: 'success', title: 'Success!', text: response.data.message ? response.data.message : 'Item successfully deleted.' });
                        }, function (error) {
                            _this7.$notify({ type: 'error', title: 'Error!', text: error.response.data.message ? error.response.data.message : 'An error has occured.' });
                        });
                    }
                }]
            });
        },
        toggleSwitch: function toggleSwitch(url, col, row) {
            var _this8 = this;

            axios.post(url, row).then(function (response) {
                _this8.$notify({ type: 'success', title: 'Success!', text: response.data.message ? response.data.message : 'Item successfully changed.' });
            }, function (error) {
                row[col] = !row[col];
                _this8.$notify({ type: 'error', title: 'Error!', text: error.response.data.message ? error.response.data.message : 'An error has occured.' });
            });
        },


        publishNow: function publishNow(url, row, dialogType) {
            var _this = this;
            if (!dialogType) dialogType = 'publishNowDialog';

            this.$modal.show('dialog', {
                title: _this.trans[dialogType].title,
                text: _this.trans[dialogType].text,
                buttons: [{ title: _this.trans[dialogType].no }, {
                    title: '<span class="btn-dialog btn-success">' + _this.trans[dialogType].yes + '<span>',
                    handler: function handler() {
                        _this.$modal.hide('dialog');

                        axios.post(url, { publish_now: true }).then(function (response) {
                            row.published_at = response.data.object.published_at;
                            _this.$notify({ type: 'success', title: 'Success!', text: response.data.message ? response.data.message : _this.trans[dialogType].success });
                        }, function (error) {

                            _this.$notify({ type: 'error', title: 'Error!', text: error.response.data.message ? error.response.data.message : _this.trans[dialogType].error });
                        });
                    }
                }]
            });
        },

        unpublishNow: function unpublishNow(url, row, additionalWarning) {
            var _this = this;
            var dialogType = 'unpublishNowDialog';

            this.$modal.show('dialog', {
                title: _this.trans[dialogType].title,
                text: _this.trans[dialogType].text + (additionalWarning ? '<br /><span class="text-danger">' + additionalWarning + '</span>' : ''),
                buttons: [{ title: _this.trans[dialogType].no }, {
                    title: '<span class="btn-dialog btn-danger">' + _this.trans[dialogType].yes + '<span>',
                    handler: function handler() {
                        _this.$modal.hide('dialog');

                        axios.post(url, { unpublish_now: true }).then(function (response) {
                            row.published_at = response.data.object.published_at;
                            row.published_to = response.data.object.published_to;
                            _this.$notify({ type: 'success', title: 'Success!', text: response.data.message ? response.data.message : _this.trans[dialogType].success });
                        }, function (error) {

                            _this.$notify({ type: 'error', title: 'Error!', text: error.response.data.message ? error.response.data.message : _this.trans[dialogType].error });
                        });
                    }
                }]
            });
        },

        publishLater: function publishLater(url, row, dialogType) {
            var _this = this;
            if (!dialogType) dialogType = 'publishLaterDialog';

            this.$modal.show({
                template: '\n                    <div class="vue-dialog">\n                        <div class="card-body">\n                            <p>{{ trans.text }}</p>\n                            <div class="form-group row align-items-center">\n                                <div class="col">\n                                    <datetime \n                                        \n                                        v-model="mutablePublishedAt"\n                                        :config="datetimePickerConfig" \n                                        v-validate="\'date_format:yyyy-MM-dd HH:mm:ss\'" \n                                        class="flatpickr" \n                                        >\n                                    </datetime>\n                                </div>\n                            </div>\n                            <div class="row">\n                                <div class="col">\n                                    <button class="col btn btn-secondary" @click="$emit(\'close\')">{{trans.no}}</button>                            \n                                </div>\n                                <div class="col">\n                                    <button class="col btn btn-success" type="button" @click="save(mutablePublishedAt)">{{trans.yes}}</button>\n                                </div>\n                            </div>\n                        </div>                \n                    </div>                \n                ',
                props: ['trans', 'published_at', 'datetimePickerConfig', 'save'],
                data: function data() {
                    return {
                        mutablePublishedAt: row.published_at
                    };
                }
            }, {
                published_at: row.published_at,
                datetimePickerConfig: _this.datetimePickerConfig,
                trans: _this.trans[dialogType],
                save: function save(mutablePublishedAt) {
                    _this.$modal.hide('PublishLaterDialog');

                    axios.post(url, { published_at: mutablePublishedAt }).then(function (response) {
                        row.published_at = response.data.object.published_at;
                        _this.$notify({ type: 'success', title: 'Success!', text: response.data.message ? response.data.message : _this.trans[dialogType].success });
                    }, function (error) {

                        _this.$notify({ type: 'error', title: 'Error!', text: error.response.data.message ? error.response.data.message : _this.trans[dialogType].error });
                    });
                }

            }, {
                width: 350,
                height: 'auto',
                name: 'PublishLaterDialog'
            });
        }
    }

};
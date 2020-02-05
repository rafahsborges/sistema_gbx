'use strict';

Object.defineProperty(exports, "__esModule", {
	value: true
});
var UserDetailTooltip = {
	template: '\n\t<v-popover class="avatar-tooltip-trigger"\n\t\ttrigger="click" \n        :placement="placement"\n\t\toffset="5"\n\t\tcontainer="body"\n\t\t:auto-hide="true"\n\t>\n\n        <img :src="user.avatar_thumb_url" class="avatar-photo" :alt="user.full_name" v-if="user.avatar_thumb_url">\n        <div class="avatar-initials" v-if="!user.avatar_thumb_url">\n\t\t\t{{ abbr }}\n\t\t</div>\n\n\t\t<div class="avatar-full-name" v-if="options.showFullNameLabel">\n\t\t\t{{ user.full_name }}\n\t\t\t<span v-if="edit && datetime != \'\'">\n\t\t\t    <br>\n\t\t\t    <span class="user-info-span">{{datetime}}</span>\n\t\t\t</span>\n\t\t</div>\n\n\t\t<template slot="popover">\n\t\t\t<div class="user-avatar">\n\t\t\t\t<img :src="user.avatar_thumb_url" class="avatar-photo" :alt="user.full_name" v-if="user.avatar_thumb_url">\n\t\t\t\t<div class="avatar-initials" v-else>\n\t\t\t\t\t{{ abbr }}\n\t\t\t\t</div>\n\t\t\t</div>\n\n\t\t\t<div class="user-info">\n\t\t\t\t<h3>{{ user.full_name }} <small v-if="userText">| <strong style="text-transform: uppercase">{{ userText }}</strong></small></h3>\n\t\t\t\t<a v-if="user.email" v-bind:href="[\'mailto:\' + user.email]">{{ user.email }}</a>\n\n\t\t\t\t<slot></slot>\n\t\t\t</div>\n\t\t</template>\n    </v-popover>\n',

	props: {
		user: {
			type: Object,
			required: true
		},
		userText: {
			type: String,
			default: function _default() {
				return '';
			}
		},
		text: {
			type: String,
			default: function _default() {
				return '';
			}
		},
		options: {
			type: Object,
			default: function _default() {
				return {
					showFullNameLabel: true
				};
			}
		},
		placement: {
			type: String,
			default: function _default() {
				return 'top';
			}
		},
		edit: {
			type: Boolean,
			default: function _default() {
				return false;
			}
		},
		datetime: ''
	},
	computed: {
		abbr: function abbr() {
			return '' + this.user.first_name.slice(0, 1) + this.user.last_name.slice(0, 1);
		}
	}
};

exports.default = UserDetailTooltip;
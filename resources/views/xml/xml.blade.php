<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>

<root>
    <UploadSICI ano="{{$sici->ano}}" mes="{{$sici->mes}}">
        <Outorga fistel="{{$sici->fistel}}">
            <Indicador Sigla="IEM4">
                <Conteudo uf="{{$sici->estado->abreviacao}}" item="a" valor="{{$sici->iem4a}}"/>
            </Indicador>
            <Indicador Sigla="IEM5">
                <Conteudo uf="{{$sici->estado->abreviacao}}" item="a" valor="{{$sici->iem5a}}"/>
            </Indicador>
            <Indicador Sigla="IEM9">
                <Pessoa item="F">
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="a" valor="{{str_replace('.', ',', $sici->iem9Fa)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="b" valor="{{str_replace('.', ',', $sici->iem9Fb)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="c" valor="{{str_replace('.', ',', $sici->iem9Fc)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="d" valor="{{str_replace('.', ',', $sici->iem9Fd)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="e" valor="{{str_replace('.', ',', $sici->iem9Fe)}}"/>
                </Pessoa>
                <Pessoa item="J">
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="a" valor="{{str_replace('.', ',', $sici->iem9Ja)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="b" valor="{{str_replace('.', ',', $sici->iem9Jb)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="c" valor="{{str_replace('.', ',', $sici->iem9Jc)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="d" valor="{{str_replace('.', ',', $sici->iem9Jd)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="e" valor="{{str_replace('.', ',', $sici->iem9Je)}}"/>
                </Pessoa>
            </Indicador>
            <Indicador Sigla="IEM10">
                <Pessoa item="F">
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="a" valor="{{str_replace('.', ',', $sici->iem10Fa)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="b" valor="{{str_replace('.', ',', $sici->iem10Fb)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="c" valor="{{str_replace('.', ',', $sici->iem10Fc)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="d" valor="{{str_replace('.', ',', $sici->iem10Fd)}}"/>
                </Pessoa>
                <Pessoa item="J">
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="a" valor="{{str_replace('.', ',', $sici->iem10Ja)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="b" valor="{{str_replace('.', ',', $sici->iem10Jb)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="c" valor="{{str_replace('.', ',', $sici->iem10Jc)}}"/>
                    <Conteudo uf="{{$sici->estado->abreviacao}}" item="d" valor="{{str_replace('.', ',', $sici->iem10Jd)}}"/>
                </Pessoa>
            </Indicador>
            <Indicador Sigla="IPL3">
                <Municipio codmunicipio="{{$sici->cidade->ibge_code}}">
                    <Pessoa item="F">
                        <Conteudo item="a" valor="{{$sici->ipl3Fa}}"/>
                    </Pessoa>
                    <Pessoa item="J">
                        <Conteudo item="a" valor="{{$sici->ipl3Ja}}"/>
                    </Pessoa>
                </Municipio>
            </Indicador>
            <Indicador Sigla="QAIPL4SM">
                <Municipio codmunicipio="{{$sici->cidade->ibge_code}}">
                    <Tecnologia item="A">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smAqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smAtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smA15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smA16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smA17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smA18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smA19}}"/>
                    </Tecnologia>
                    <Tecnologia item="B">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smBqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smBtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smB15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smB16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smB17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smB18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smB19}}"/>
                    </Tecnologia>
                    <Tecnologia item="C">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smCqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smCtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smC15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smC16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smC17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smC18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smC19}}"/>
                    </Tecnologia>
                    <Tecnologia item="D">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smDqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smDtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smD15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smD16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smD17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smD18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smD19}}"/>
                    </Tecnologia>
                    <Tecnologia item="E">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smEqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smEtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smE15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smE16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smE17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smE18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smE19}}"/>
                    </Tecnologia>
                    <Tecnologia item="F">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smFqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smFtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smF15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smF16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smF17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smF18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smF19}}"/>
                    </Tecnologia>
                    <Tecnologia item="G">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smGqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smGtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smG15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smG16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smG17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smG18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smG19}}"/>
                    </Tecnologia>
                    <Tecnologia item="H">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smHqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smHtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smH15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smH16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smH17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smH18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smH19}}"/>
                    </Tecnologia>
                    <Tecnologia item="I">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smIqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smItotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smI15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smI16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smI17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smI18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smI19}}"/>
                    </Tecnologia>
                    <Tecnologia item="J">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smJqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smJtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smJ15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smJ16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smJ17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smJ18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smJ19}}"/>
                    </Tecnologia>
                    <Tecnologia item="K">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smKqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smKtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smK15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smK16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smK17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smK18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smK19}}"/>
                    </Tecnologia>
                    <Tecnologia item="L">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smLqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smLtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smL15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smL16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smL17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smL18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smL19}}"/>
                    </Tecnologia>
                    <Tecnologia item="M">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smMqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smMtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smM15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smM16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smM17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smM18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smM19}}"/>
                    </Tecnologia>
                    <Tecnologia item="N">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smNqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smNtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smN15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smN16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smN17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smN18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smN19}}"/>
                    </Tecnologia>
                    <Tecnologia item="O">
                        <Conteudo nome="QAIPL5SM" valor="{{$sici->qaipl4smOqaipl5sm}}"/>
                        <Conteudo nome="total" valor="{{$sici->qaipl4smOtotal}}"/>
                        <Conteudo faixa="15" valor="{{$sici->qaipl4smO15}}"/>
                        <Conteudo faixa="16" valor="{{$sici->qaipl4smO16}}"/>
                        <Conteudo faixa="17" valor="{{$sici->qaipl4smO17}}"/>
                        <Conteudo faixa="18" valor="{{$sici->qaipl4smO18}}"/>
                        <Conteudo faixa="19" valor="{{$sici->qaipl4smO19}}"/>
                    </Tecnologia>
                </Municipio>
            </Indicador>
            <Indicador Sigla="IPL6IM">
                <Conteudo codmunicipio="{{$sici->cidade->ibge_code}}" valor="{{$sici->ipl6im}}"/>
            </Indicador>
            <Indicador Sigla="IAU1">
                <Conteudo valor="{{$sici->iau1}}"/>
            </Indicador>
            <Indicador Sigla="IPL1">
                <Conteudo item="a" valor="{{str_replace('.', ',', $sici->ipl1a)}}"/>
                <Conteudo item="b" valor="{{str_replace('.', ',', $sici->ipl1b)}}"/>
                <Conteudo item="c" valor="{{str_replace('.', ',', $sici->ipl1c)}}"/>
                <Conteudo item="d" valor="{{str_replace('.', ',', $sici->ipl1d)}}"/>
            </Indicador>
            <Indicador Sigla="IPL2">
                <Conteudo item="a" valor="{{str_replace('.', ',', $sici->ipl2a)}}"/>
                <Conteudo item="b" valor="{{str_replace('.', ',', $sici->ipl2b)}}"/>
                <Conteudo item="c" valor="{{str_replace('.', ',', $sici->ipl2c)}}"/>
                <Conteudo item="d" valor="{{str_replace('.', ',', $sici->ipl2d)}}"/>
            </Indicador>
            <Indicador Sigla="IEM1">
                <Conteudo item="a" valor="{{str_replace('.', ',', $sici->iem1a)}}"/>
                <Conteudo item="b" valor="{{str_replace('.', ',', $sici->iem1b)}}"/>
                <Conteudo item="c" valor="{{str_replace('.', ',', $sici->iem1c)}}"/>
                <Conteudo item="d" valor="{{str_replace('.', ',', $sici->iem1d)}}"/>
                <Conteudo item="e" valor="{{str_replace('.', ',', $sici->iem1e)}}"/>
                <Conteudo item="f" valor="{{str_replace('.', ',', $sici->iem1f)}}"/>
                <Conteudo item="g" valor="{{str_replace('.', ',', $sici->iem1g)}}"/>
            </Indicador>
            <Indicador Sigla="IEM2">
                <Conteudo item="a" valor="{{str_replace('.', ',', $sici->iem2a)}}"/>
                <Conteudo item="b" valor="{{str_replace('.', ',', $sici->iem2b)}}"/>
                <Conteudo item="c" valor="{{str_replace('.', ',', $sici->iem2c)}}"/>
            </Indicador>
            <Indicador Sigla="IEM3">
                <Conteudo item="a" valor="{{str_replace('.', ',', $sici->iem3a)}}"/>
            </Indicador>
            <Indicador Sigla="IEM6">
                <Conteudo item="a" valor="{{str_replace('.', ',', $sici->iem6a)}}"/>
            </Indicador>
            <Indicador Sigla="IEM7">
                <Conteudo item="a" valor="{{str_replace('.', ',', $sici->iem7a)}}"/>
            </Indicador>
            <Indicador Sigla="IEM8">
                <Conteudo item="a" valor="{{str_replace('.', ',', $sici->iem8a)}}"/>
                <Conteudo item="b" valor="{{str_replace('.', ',', $sici->iem8b)}}"/>
                <Conteudo item="c" valor="{{str_replace('.', ',', $sici->iem8c)}}"/>
                <Conteudo item="d" valor="{{str_replace('.', ',', $sici->iem8d)}}"/>
                <Conteudo item="e" valor="{{str_replace('.', ',', $sici->iem8e)}}"/>
            </Indicador>
        </Outorga>
    </UploadSICI>
</root>

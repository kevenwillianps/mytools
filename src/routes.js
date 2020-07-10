/** Importo os Componentes Para Gerar os Dados Pessoais **/
import CPF from './components/Pessoa/cpf_generate';

/** Importo os Componentes Para Gerar os Dados Empresariais **/
import CNPJ from './components/Empresa/cnpj_generate';

/** Importo os Componentes Para criptografia de Dados **/
import Base64 from './components/Criptografia/Base64/base64_encode';
import MD5 from './components/Criptografia/MD5/md5_encode';
import SHA1 from './components/Criptografia/SHA1/sha1_encode';

/** Importo os Componentes da web **/
import CSSMinify from './components/Web/CSS/css_minify'
import JSMinify from './components/Web/JS/js_minify'

/** Importo os Componentes do Correios **/
import FreteCalculate from './components/Correios/frete_calculate'

/** Importo os Componentes de Edição de Texto **/
import EdicaoRapida from './components/Texto/edica_rapida'

/** Importo os Componentes de Edição de Texto **/
import ImageCompress from './components/Imagem/Comprimir/image_compress'

const routes = [

    {

        /** Página Para Gerar CPF **/
        path      : '/pessoal/cpf/gerar/',
        component : CPF,
        name      : 'cpf',

    },

    {

        /** Página Para Gerar CNPJ **/
        path      : '/empresa/cnpj/gerar/',
        component : CNPJ,
        name      : 'cnpj',

    },

    {

        /** Página Para Gerar CNPJ **/
        path      : '/criptografia/bas64/codificar/',
        component : Base64,
        name      : 'base64',

    },

    {

        /** Página Para Gerar CNPJ **/
        path      : '/criptografia/md5/codificar/',
        component : MD5,
        name      : 'md5',

    },

    {

        /** Página Para Gerar CNPJ **/
        path      : '/criptografia/sha1/codificar/',
        component : SHA1,
        name      : 'sha1',

    },

    {

        /** Página Para Gerar CNPJ **/
        path      : '/web/comprimir/css/',
        component : CSSMinify,
        name      : 'css-minify',

    },

    {

        /** Página Para Gerar CNPJ **/
        path      : '/web/comprimir/js/',
        component : JSMinify,
        name      : 'js-minify',

    },

    {

        /** Página Para Gerar CNPJ **/
        path      : '/correios/frete/calcular/',
        component : FreteCalculate,
        name      : 'frete-calculate',

    },

    {

        /** Página Para Editar Texto Sem Login **/
        path      : '/texto/edicao/rapida/',
        component : EdicaoRapida,
        name      : 'edicao-rapida',

    },

    {

        /** Página Para Comprimir Imagens **/
        path      : '/imagem/comprimir/',
        component : ImageCompress,
        name      : 'image-compress',

    },

];

export default routes;
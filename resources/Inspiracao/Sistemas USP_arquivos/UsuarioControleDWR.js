if (typeof dwr == 'undefined' || dwr.engine == undefined) throw new Error('You must include DWR engine before including this file');

(function() {
if (dwr.engine._getObject("UsuarioControleDWR") == undefined) {
var p;

p = {};
p._path = '/wsusuario/dwr';




p.verificarSessao = function(callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'verificarSessao', arguments);
};





p.encerrarSessao = function(p0, callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'encerrarSessao', arguments);
};







p.solicitarSenha = function(p0, p1, p2, callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'solicitarSenha', arguments);
};







p.cadastrarSenha = function(p0, p1, p2, callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'cadastrarSenha', arguments);
};







p.alterarSenha = function(p0, p1, p2, callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'alterarSenha', arguments);
};




p.listarSistema = function(callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'listarSistema', arguments);
};









p.inserirUsuarioExterno = function(p0, p1, p2, p3, p4, callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'inserirUsuarioExterno', arguments);
};




p.listarSessao = function(callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'listarSessao', arguments);
};




p.obterUsuario = function(callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'obterUsuario', arguments);
};





p.alterarEmail = function(p0, callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'alterarEmail', arguments);
};






p.alterarUsuarioExterno = function(p0, p1, callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'alterarUsuarioExterno', arguments);
};






p.autenticarUsuario = function(p0, p1, callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'autenticarUsuario', arguments);
};




p.obterCookieSSO = function(callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'obterCookieSSO', arguments);
};




p.obterQtdeDiasExpiracaoSenha = function(callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'obterQtdeDiasExpiracaoSenha', arguments);
};









p.primeiroAcesso = function(p0, p1, p2, p3, p4, callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'primeiroAcesso', arguments);
};




p.obterEmailUsuario = function(callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'obterEmailUsuario', arguments);
};









p.alterarSenhaPublico = function(p0, p1, p2, p3, p4, callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'alterarSenhaPublico', arguments);
};







p.solicitarAlterarEmail = function(p0, p1, p2, callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'solicitarAlterarEmail', arguments);
};




p.listarSistemaOauth = function(callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'listarSistemaOauth', arguments);
};




p.obterLinkGedWeb = function(callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'obterLinkGedWeb', arguments);
};






p.removerUsuarioUspSistemaOauth = function(p0, p1, callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'removerUsuarioUspSistemaOauth', arguments);
};




p.listarServico = function(callback) {
return dwr.engine._execute(p._path, 'UsuarioControleDWR', 'listarServico', arguments);
};

dwr.engine._setObject("UsuarioControleDWR", p);
}
})();


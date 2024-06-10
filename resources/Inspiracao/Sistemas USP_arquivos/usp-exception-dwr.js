function errorHandler(msg, exception) {
   mostrarErro(msg);
}
dwr.engine.setErrorHandler(errorHandler);
dwr.engine.setTimeout(30000);
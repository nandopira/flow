    <!-- Modal de Aprovação -->
    <div class="modal fade" id="aprovarModal" tabindex="-1" aria-labelledby="aprovarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aprovarModalLabel">Justificativa para Aprovação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="justificativaForm">
                        <div class="form-group">
                            <label for="justificativa">Justificativa</label>
                            <textarea class="form-control" id="justificativa" name="justificativa" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal nova Tarefa -->
    <div class="modal fade" id="NovaTarefaModal" tabindex="-1" aria-labelledby="NovaTarefaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="NovaTarefaModalLabel">Nova tarefa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ route('atendimento.novatarefa', ['id' => $atendimento->id]) }}" method="POST" style="display:inline;">
                     @csrf
                    <input type="hidden" name="table_name" id="table_name" value="TAREFA">   
                        <div class="form-group">
                            <label for="NovaTarefaDescricao">Descrição</label>
                            <input type="hidden" name="atendimento_id" id="atendimento_id" value="{{$atendimento->id}}">
                            <textarea class="form-control" id="NovaTarefaDescricao" name="NovaTarefaDescricao" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



        <!-- Modal nova Agenda -->
        <div class="modal fade" id="agendaModal" tabindex="-1" aria-labelledby="agendaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agendaModalLabel">Novo agendamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ route('atendimento.novoagendamento', ['id' => $atendimento->id]) }}" method="POST" style="display:inline;">
                     @csrf
                    <input type="hidden" name="table_name" id="table_name" value="TAREFA">   
                        <div class="form-group">
                            <label for="NovaTarefaDescricao">Descrição</label>
                            <input type="hidden" name="atendimento_id" id="atendimento_id" value="{{$atendimento->id}}">
                            <textarea class="form-control" id="NovaTarefaDescricao" name="NovaTarefaDescricao" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

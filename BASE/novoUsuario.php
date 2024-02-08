
<h1>Novo Usuario</h1>

<form action="?page=salvar" method="POST">
        <input type="hidden" name="acao" value="cadastrar">
         <div class="mb-3">
        <label for="nome">Nome</label>
        <input required type="text" name="nome" class="form-control" id="nome">
         </div>
        <div class="mb-3">
        <label for="email">Email</label>
        <input required type="email" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
        <label for="senha">Senha</label>
        <input required type="password" name="senha" id="senha" class="form-control">
        </div>
         <div class="mb-3">
        <label for="data_nasc">Data de Nascimento</label>
        <input required type="date" name="data_nasc" id="nascimento" class="form-control">
        </div>
        <div class="mb-3">
       <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
</form>

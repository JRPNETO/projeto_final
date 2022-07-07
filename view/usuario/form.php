<!-- Conteúdo da página-->
<div class="container mt-2 mt-3">
  <h1 class="mt-2">Cadastro de Usário</h1>
  <hr>
<form method="POST" action="<?= base_url(). "?c=usuario&m=salvar" ?>">
 
<div class="mb-3">
    <label for="login" class="form-label">Login</label>
    <input type="text" class="form-control" id="login" name="login" value="<?= $usuario['login'] ?? '' ?>">
  </div>

  <div class="mb-3">
    <label for="senha" class="form-label">Senha</label>
    <input type="text" class="form-control" id="senha" name="senha" value="<?= $usuario['senha'] ?? '' ?>">
  </div>

  <input type="hidden" name='idusuario' value="<?= $usuario['idusuario'] ?? '' ?>">
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
</div>
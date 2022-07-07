<!-- Conteúdo da página-->
<div class="container">
  <h1 class="mt-2">Lista de categorias</h1>
  <hr>


  <a href="<?= base_url() ."?c=categoria&m=add" ?>" class="btn btn-success">Inserir Categoria</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-10">Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categorias as $categoria):?>
        <tr>
            <td><?= $categoria['nome'] ?></td>
            <td>
                <a href="<?php echo base_url() ?>?c=categoria&m=excluir&id=<?= $categoria['idcategoria']; ?>"  class="btn btn-danger" title="Excluir"> 
                    <i class="fa-solid fa-trash-can"></i>
            </a>
            <a href="<?php echo base_url() ?>?c=categoria&m=editar&id=<?= $categoria['idcategoria']; ?>"  class="btn btn-primary" title="Editar"> 
                    <i class="fa-solid fa-pencil"></i>
            </a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

</div>
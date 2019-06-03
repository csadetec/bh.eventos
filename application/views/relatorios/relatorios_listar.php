<ul id="myList" class="list-group">
  <?php 
  if($relatorio):   ?>    
    <li class="list-group-item">
    <?php echo '<b>'.'ALUNOS TOTAL: '.'</b>'.$relatorio->alunos_total;  ?>    
    </li>
    <li class="list-group-item">
    <?php  echo '<b>'.'PEGARAM CONVITES: '.'</b>'.$relatorio->alunos_pegaram; ?>    
    </li>
    <li class="list-group-item">
      <?php echo '<b>'.'NÃO PEGARAM CONVITES: '.'</b>'.$relatorio->alunos_no_pegaram; ?>    
    </li>
    <li class="list-group-item">
      <?php echo '<b>'.'CONVITES NA LISTA DE ESPERA: '.'</b>'.$relatorio->qtd_convites; ?>    
    </li>
    <li class="list-group-item">
      <?php echo '<b>'.'PESSOAS NA LISTA DE ESPERA: '.'</b>'.$relatorio->qtd_pessoas_espera; ?>    
    </li>
    <li class="list-group-item">
      <?php echo '<b>'.'CONVITES / PESSOAS  LISTA DE ESPERA: '.'</b>'.$relatorio->media; ?>    
    </li>
  <?php  endif; ?>      
</ul>

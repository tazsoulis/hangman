<div class="container">
  <div class="spacer-40"></div>
  <h4><b>Best Players</b></h4>
  <div class="row">
    <div class="col s4 offset-s4">
      <table class="highlight">
        <thead>
          <tr>
            <th data-field="id">Player</th>
            <th data-field="name">Score</th>  
          </tr>
        </thead>
        <tbody>
          
          <?php foreach ($users as $user): ?>
            <tr>
              <td><?= $user->username; ?></td>
              <td><?= $user->credits; ?></td>
            </tr>    
          <?php endforeach; ?>
         
        </tbody>
      </table>
    </div>
  </div>
</div>
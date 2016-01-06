<div class="row">
  <div class="col s4">
    <form action="<?=site_url('Application/add_word')?>" method="POST">
    <div class="spacer-100"></div>
      <div class="row">
        <div class="input-field col s5">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="word" class="validate">
          <label for="icon_prefix">Give a word</label>
        </div>
        <div class=" col s1">
          <button type="submit"  class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">add</i></button>
        </div>
        
      </div>
    </form>
  </div>
  <div class="col s6">
    <div id="highlight" class="section scrollspy">
        <h2 class="header">Words</h2>
        <div class="row">
          <div class="col s12">
            <table class="highlight">
              <thead>
                <tr>
                    <th data-field="id">Name</th>
                    <th data-field="name">Edit</th>
                    <th data-field="price">Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($words as $word): ?>
                <tr>
                  <td><?= $word->word; ?></td>
                  <td>
                    <form action="<?=site_url('Application/edit_record')?>" method="POST">
                      <input type="hidden" name="id" value="<?= $word->id; ?>"/>
                      <a href="edit/<?= $word->id; ?>"class="btn-floating btn-large waves-effect waves-light  darken-3"><i class="material-icons">loop</i></a>
                     
                    </form>
                  </td>
                  <td>
                    <form action="<?=site_url('Application/delete_word')?>" method="POST">
                      <input type="hidden" name="id" value="<?= $word->id; ?>"/>
                      <button class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
  
</div>


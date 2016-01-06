

  <div class="row">

    <form action="<?=site_url('Application/addUser')?>"  onsubmit="return checkforblank()" method="POST" class="col s4 offset-s4">
    <h4  style="margin-top:40px;">Register User</h4>
      <div class="row">
        <div class="input-field ">
          <i class="material-icons prefix">account_circle</i>
          <input   id="username" type="text" name="username" class="validate">
          <label for="icon_prefix">Username</label>
        </div>
        <div class="input-field ">
          <i class="material-icons prefix">account_circle</i>
          <input  id="password" type="password" name="password" class="validate">
          <label for="icon_prefix">Password</label>
        </div>
        <div class="input-field ">
          <select name="sex" id="sex" class="icons">
            <option value="" disabled selected>Choose SEX</option>
            <option value="girl" data-icon="assets/img/girl.jpg" class="left circle">girl</option>
            <option value="boy" data-icon="assets/img/boy.png" class="left circle">boy</option>
          </select>
        </div>
      </div>
      <button type="submit" style="width:205px;" class="waves-effect waves-light btn-large">register</button>
    </form>

  </div>



<div class="content-wrapper">
<div class="container-fluid" style="background-color: white; height: 700px;">
    <ol class="breadcrumb" style="background-color: #3a3a3a;">
        <li class="breadcrumb-item">
            <a href="" style="color: white;">Edit Menu</a>
        </li>
        <li class="breadcrumb-item active" style="color: white;">Overview</li>
    </ol>
<style>
    /* .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
    width: 100%;
    padding-right: 18.5px;
    padding-left: 272.5px;
    padding-top: 95px ;
    margin-right: auto;
    margin-left: auto;
    } */
</style>
    <center>
        <h4><b>.:: Edit Menu ::.</b></h4>
      <div class="col-md-6">         
        <div class="card-body" style="height:38rem; width:auto;">
          <div class="row">
            <div class="col-lg-10">
              <?= $this->session->flashdata('message'); ?>
              <?= form_open_multipart('menu/edit_menu'); ?>
                <div class="form-group row">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $menu['id']; ?>">
                  <label for="menu" class="col-sm-2 col-form-label">Menu :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="menu" name="menu" value="<?= $menu['menu']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="alias" class="col-sm-2 col-form-label">Alias :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alias" name="alias" value="<?= $menu['alias']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="icon" class="col-sm-2 col-form-label">Icon :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $menu['icon']; ?>">
                  </div>
                </div>

                <hr>
                  <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                        <a href="<?= base_url('menu'); ?>" type="submit" class="btn btn-success btn-sm">Kembali</a>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </center>
</div>
</div>
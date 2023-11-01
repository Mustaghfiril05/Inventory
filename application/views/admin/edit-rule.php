<div class="container-fluid" style="background-color: white; height: 700px;">
    <ol class="breadcrumb" style="background-color: #3a3a3a;">
        <li class="breadcrumb-item">
            <a href="" style="color: white;">Edit Rule</a>
        </li>
        <li class="breadcrumb-item active" style="color: white;">Overview</li>
    </ol>
<style>
    .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
    width: 100%;
    padding-right: 18.5px;
    padding-left: 272.5px;
    padding-top: 95px ;
    margin-right: auto;
    margin-left: auto;
    }
</style>
    <center>
      <div class="col-md-10">         
        <div class="card-body" style="height:38rem; width:auto;">
          <div class="row">
            <div class="col-lg-10">
              <?= $this->session->flashdata('message'); ?>
              <?= form_open_multipart('admin/edit_rule'); ?>
                <div class="form-group row">
                    <input type="hidden" class="form-control" id="id_rule" name="id_rule" value="<?= $rule['id_rule']; ?>">
                  <label for="rule" class="col-sm-2 col-form-label">Rule :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="rule" name="rule" value="<?= $rule['rule']; ?>">
                  </div>
                </div>
                <hr>
                  <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
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
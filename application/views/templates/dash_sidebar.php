<!-- <style>
  .os-padding {
    box-sizing: inherit;
    direction: inherit;
    position: absolute;
    overflow: visible;
    padding: 0;
    margin: 0;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    width: auto!important;
    height: auto!important;
    z-index: 1;
    background-color: #ffffff;
  }
  .os-viewport {
    direction: inherit!important;
    box-sizing: inherit!important;
    resize: none!important;
    outline: 0!important;
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    padding: 0;
    margin: 0;
    -webkit-overflow-scrolling: touch;
    background-color: #ffffff;
  }
  .os-content {
    direction: inherit;
    box-sizing: border-box!important;
    position: relative;
    display: block;
    height: 100%;
    width: 100%;
    height: 100%;
    width: 100%;
    visibility: visible;
    background-color: #ffffff;
  }
</style> -->
<style>
    .btn {
      padding: 10px 15px;
      font-size: 10px;
      text-align: center;
      cursor: pointer;
      outline: none;
      color: #fff;
      background-color: #04AA6D;
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px #999;
    }

    .btn:hover {background-color: #04AA6D}

    .btn:active {
      background-color: #04AA6D;
      box-shadow: 0 5px #666;
      transform: translateY(7px);
    }
</style>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light"><b style="font-size: 20px;">Inventory Web Based</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url ('assets/img/profile/').$user['gambar'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $user['nama'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- select tabel menu -->
            <?php 
              $id_rule = $this ->session->userdata('id_rule');
              $queryMenu = "SELECT `inventory_user_menu`.`id`,`menu`,`alias`, `icon`
                            FROM `inventory_user_menu` JOIN `inventory_user_askes_menu` 
                            ON `inventory_user_menu`.`id` = `inventory_user_askes_menu`.`menu_id`
                            WHERE `inventory_user_askes_menu`.`id_rule` = '$id_rule'
                            ORDER BY `inventory_user_askes_menu`.`menu_id` ASC
                            ";
              $menu = $this->db->query($queryMenu)->result_array();
            ?>
        
        <?php foreach ($menu as $m) : ?>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link" style="font-size: 14px;">
              <i style="font-size: 14px;" class="nav-icon <?= $m['icon']; ?>"></i>
              <p><b>
                <?= $m['alias']; ?></b>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
        <!-- select Sub Menu -->
            <?php
                $menuId = $m ['id'];
                $querySubMenu = "SELECT *
                                  FROM `inventory_user_sub_menu` JOIN `inventory_user_menu` 
                                    ON `inventory_user_sub_menu`.`menu_id` = `inventory_user_menu`.`id`
                                WHERE `inventory_user_sub_menu`.`menu_id` = $menuId
                                  AND `inventory_user_sub_menu`.`is_active` = 1
                              ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

                <?php foreach ($subMenu as $sm) : ?>
                <ul class="nav nav-treeview">
                  <li class="nav-item" style="font-size: 14px;">
                    <a href="<?= base_url($sm['url']);?>" class="nav-link">
                      <i class="nav-icon fas fa-tachometer1-alt"></i>
                      <p><?= $sm['judul']; ?></p>
                    </a>
                  </li>
                </ul>
                <?php endforeach;?>
          </li>
          <?php endforeach;?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
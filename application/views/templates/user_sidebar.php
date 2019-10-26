  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-code"></i>
          </div>
          <div class="sidebar-brand-text mx-3">AfuWeb <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Query menu -->
      <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "select `user_menu`.`id`, `user_menu`.`menu`
        from `user_menu` join `user_access_menu` 
        on `user_menu`.`id` = `user_access_menu`.`menu_id`
        where `user_access_menu`.`role_id`= $role_id
        order by `user_access_menu`.`menu_id` asc
        ";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>

      <!-- Looping menu sesuai user -->
      <?php foreach ($menu as $m) : ?>
          <div class="sidebar-heading">
              <?= $m['menu']; ?>
          </div>

          <!-- Siapkan SubMenu sesuai menu -->
          <?php
                $menuId = $m['id'];
                $querySubMenu = "
                select *
                from `user_sub_menu` 
                where `user_sub_menu`.`menu_id`= $menuId
                and `user_sub_menu`.`is_active`=1  
                ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>
          <?php foreach ($subMenu as $sm) : ?>
              <!-- Looping subMenu -->
              <?php if ($title == $sm['title']) : ?>
                  <li class="nav-item active">
                  <?php else : ?>
                  <li class="nav-item">
                  <?php endif; ?>
                  <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                      <i class="<?= $sm['icon']; ?>"></i>
                      <span><?= $sm['title']; ?></span></a>
                  </li>
              <?php endforeach; ?>

              <!-- Divider -->
              <hr class="sidebar-divider mt-3">

          <?php endforeach; ?>


          <!-- Nav Item - Logout -->
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                  <i class="fas fa-fw fa-sign-out-alt"></i>
                  <span>Logout</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

  </ul>
  <!-- End of Sidebar -->
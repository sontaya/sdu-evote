<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!--ACCESS MENUS FOR ADMIN-->
                <?php if($this->session->userdata('level')==='1'):?>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                  <p class="text">Dashboard</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                  <p class="text">Posts</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                  <p class="text">Pages</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                  <p class="text">Media</p>
                  </a>
                  </li>
                <!--ACCESS MENUS FOR STAFF-->
                <?php elseif($this->session->userdata('level')==='2'):?>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                  <p class="text">Dashboard</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                  <p class="text">Pages</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                  <p class="text">Media</p>
                  </a>
                  </li>
                <!--ACCESS MENUS FOR AUTHOR-->
                <?php else:?>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                  <p class="text">Dashboard</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#" class="nav-link">
                  <p class="text">Posts</p>
                  </a>
                  </li>
                <?php endif;?>
              </ul>
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item"><a href="<?php echo site_url('login/logout');?>" class="nav-link">Sign Out</a></li>
              </ul> 
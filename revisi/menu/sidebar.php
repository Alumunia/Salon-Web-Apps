      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../dist/img/avatar<?php echo $pict ?>.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $id ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU UTAMA</li>
            <li class="treeview <?php echo $itu;?>">
              <a href="input_training.php ">
                <i class="fa fa-gavel"></i> <span>Input Training</span>
              </a>
            </li>
            <li class="treeview <?php echo $ipro;?>">
              <a href="input_produk.php">
                <i class="fa fa-glass"></i> <span>Input Produk</span>
              </a>
            </li>
            <li class="treeview <?php echo $ipeng;?>">
              <a href="../menu/table_outcome.php">
                <i class="fa fa-usd"></i> <span>Input Pengeluaran</span>
              </a>
            </li>
			<?php
				if(isset($priv)) {
					?>
            <li class="treeview <?php echo $ehs;?>">
              <a href="../menu/table_unit.php">
                <i class="fa fa-pencil"></i> <span>Edit Harga Satuan</span>
              </a>
            </li>
					<?php
				}
			?>
            <li class="treeview <?php echo $lpt;?>">
              <a href="lap_training_search.php">
                <i class="fa fa-file-o"></i> <span>Lap Peserta Training</span>
              </a>
            </li>
			<?php
				if(isset($priv)) {
					?>
            <li class="treeview <?php echo $lk;?>">
              <a href="../menu/table_report.php">
                <i class="fa fa-file-o"></i> <span>Lap Keuangan</span>
              </a>
            </li>
					<?php
				}
			?>
            <li class="treeview <?php echo $pi;?>">
              <a href="../menu/table_invoice.php">
                <i class="fa fa-print"></i> <span>Print Invoice</span>
              </a>
            </li>
            <li class="treeview <?php echo $pla;?>">
              <a href="../menu/enter_address.php">
                <i class="fa fa-print"></i> <span>Print Label Alamat</span>
              </a>
            </li>
			<?php
				if(isset($priv)) {
					?>
            <li class="treeview <?php echo $admin;?>">
              <a href="../menu/administrator.php">
                <i class="fa fa-file-o"></i> <span>Administrasi</span>
              </a>
            </li>
					<?php
				}
			?>
			<?php
				if(isset($priv)) {
					?>
					 <li class="treeview <?php echo $perda;?>">
					  <a href="../menu/personaldata.php">
						<i class="fa fa-male"></i> <span>Personal Data</span>
					  </a>
					</li>
					<?php
				}
			?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
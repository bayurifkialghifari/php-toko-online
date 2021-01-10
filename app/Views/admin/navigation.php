<?php
	
	use App\Core\Model;
	use App\Core\Request;

	$model = new Model;
	$menu = $model->select('*')
	->from('role_menu a')
	->join('menu b', 'a.role_menu_id', 'b.menu_id')
	->join('level c', 'a.role_lev_id', 'c.lev_id')
	->where('b.menu_menu_id', 0)
	->and('b.menu_status = 1')
	->and('a.role_lev_id = '.Request::sess('lev_id'))
	->orderBy('b.menu_index', 'ASC')
	->get();

	function sub_menu($menu)
	{
		$model = new Model;
		$sub_menu = $model->select('*')
		->from('role_menu a')
		->join('menu b', 'a.role_menu_id', 'b.menu_id')
		->join('level c', 'a.role_lev_id', 'c.lev_id')
		->where('b.menu_menu_id', $menu)
		->and('b.menu_status = 1')
		->and('a.role_lev_id = '.Request::sess('lev_id'))
		->orderBy('b.menu_index', 'ASC')
		->get();

		return $sub_menu;
	}

	function active_if($boolean) 
	{
		return $boolean ? 'active' : '';
	}

	function style_active_if($boolean) 
	{
		return $boolean ? 'display: block;' : 'display: none;';
	}
?>
<nav>
	
	<!-- 
	NOTE: Notice the gaps after each icon usage <i></i>..
	Please note that these links work a bit different than
	traditional href="<?= base_url() ?>assets/" links. See documentation for details.
	-->

	<ul id="navigation">
		<?php $navigation = (isset($navigation)) ? $navigation : [] ?>

		<?php foreach($menu as $q): ?>
			
			<li class="<?= active_if(in_array($q['menu_name'], $navigation)) ?>">

				<?php $menu_url = $q['menu_url'] == '#' ? '#' : (base_url . $q['menu_url']); ?>
				
				<a href="<?= $menu_url ?>" title="<?= $q['menu_name'] ?>">
					<i class="fa fa-sm fa-fw <?= $q['menu_icon'] ?>"></i> 
					<span class="menu-item-parent"><?= $q['menu_name'] ?></span>
				</a>

				<?php 
					$sub_menu 	=  sub_menu($q['menu_id']);
					if($sub_menu->num_rows > 0):
				?>
					
					<ul style="<?= style_active_if(in_array($q['menu_name'], $navigation)) ?>">
						
						<?php foreach ($sub_menu as $row) : ?>
							
							<li class="<?= active_if(in_array($row['menu_name'], $navigation)) ?>">
								
								<a href="<?= base_url() ?><?=$row['menu_url']?>"><i class="fa fa-caret-right"></i> <?=$row['menu_name']?></a>
							
							</li>
						
						<?php endforeach; ?>
					
					</ul>
				
				<?php 
					
					endif;
				
				?>
			</li>
		<?php endforeach; ?>
	</ul>

	<span class="minifyme" data-action="minifyMenu"> 
		<i class="fa fa-arrow-circle-left hit"></i> 
	</span>
</nav>
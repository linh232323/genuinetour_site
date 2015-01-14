<?php
class Benly_Support {
	public function menu($data,$lang,$parent=0,$text=""){
		
		foreach($data as $k => $menu){
			if($menu['parent_id'] == $parent){
				$is_parent = $this->is_parent($data,$menu['id']);
				if($is_parent){
					echo " <li class='nav-item'><div><a href='".$menu['link'.$lang]."'>".$menu['name'.$lang]."</a> <ul class='sub-menu'>";
				}
				else{
					if($parent != 0)
						echo "<li><a href='".$menu['link'.$lang]."'>".$menu['name'.$lang]."</a></li>";
					else{
						echo "<li class='nav-item'><div><a href='".$menu['link'.$lang]."'>".$menu['name'.$lang]."</a></div></li>";
					}
				}
				unset($data[$k]);
				$this->menu($data,$lang,$menu['id'],$text."<ul>\n");
				if($is_parent){
					echo "</ul></div></li>";
				}
				
			}
		}
		/*
		foreach($data as $k => $menu){
			if($menu['parent_id'] == $parent){
				$is_parent = $this->is_parent($data,$menu['id']);
				if($is_parent){
					echo " <li class='has-sub'><a href='".$menu['link']."'><span>".$menu['name']."</span></a> <ul class='sub-menu'>";
				}
				else{
					if($parent != 0)
						echo "<li><a href='".$menu['link']."'><span>".$menu['name']."</span></a></li>";
					else{
						echo "<li><a href='".$menu['link']."'><span>".$menu['name']."</span></a></li>";
					}
				}
				unset($data[$k]);
				$this->menu($data,$menu['id'],$text."<ul>\n");
				if($is_parent){
					echo "</ul></li>";
				}
		
			}
		}*/
	}
	public function get_time($id){
		return $id['date'];
	}
	function is_parent($data,$id){
		foreach($data as $val){
			if($val['parent_id'] == $id){
				return 1;
				break;
			}
		}
		return 0;
	}
}

?>
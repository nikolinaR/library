<?php


function getList($categories)
{
    global $depth;
    $depth = 0;

    $lists = '';
    foreach ($categories as $category) {
        if ($category['parent_id'] === null) {
            $lists .= renderOption($category);
        }
    }

    return $lists;

}


function renderOption($node)
{

    global $depth;
    $id = $node['id'];

    $list = '<option value="' . $node['id'] . '">' . dash($depth) . ' '. $node['name'] . '</option>';


    $childrens = getChildrens($id);

    $count = count($childrens);


    if ($count > 0) {
        $depth++;
        foreach ($childrens as $child) {
            $list .= renderOption($child);
        }
        $depth--;


    }

    return $list;
}

function getTree($categories)
{

    $lists = '<ul>'; 
    foreach ($categories as $category) {
        if ($category['parent_id'] === null) {
            $lists .= renderNode($category);
        }
    }

    $lists .= "</ul>";
    return $lists;
}

function renderNode($node)
{
 
    $id = $node['id'];

    $list = '<li><a class="link-warning m-3" href="/admin/categories/edit.php?cat_id=' . $node['id'] . '">' . $node['name'] . '</a> 
                <a href="/admin/categories/delete.php?cat_id=' . $node['id'] . '"><i class="bi bi-trash text-danger" data-bs-toggle="tooltip"
                data-bs-placement="top" title="Delete"></i></a>
            </li>';


    $childrens = getChildrens($id);

    $count = count($childrens);


    if ($count > 0) {
        $list .= '<ul>';
        foreach ($childrens as $child) {
            $list .= renderNode($child);
        }

        $list .= "</ul>";
    }

    return $list;
}


function getChildrens($id)
{
    global $connect;
    $results = mysqli_query($connect, "SELECT * FROM categories WHERE parent_id='$id'");

    $childrens = [];
    while ($children = mysqli_fetch_assoc($results)) {
        $childrens[] = $children;
    }
    return $childrens;
}


function dash($depth)
{
    $dash = '';
    for ($i = 1; $i <= $depth; $i++) {
        $dash .= ' - ';
    }
    return $dash;
}


?>
<?php

$items_per_page = 3;

if (isset($_GET["pg"])) {
    $current_page = filter_input(INPUT_GET, "pg", FILTER_SANITIZE_NUMBER_INT);
}

// Default to page 1
if (empty($current_page)) {
    $current_page = 1; 
}

$section = null; // no $sections yet

$total_guitars = get_catalog_count_guitars($section);
$total_guitar_pages = ceil($total_guitars / $items_per_page);

$total_amps = get_catalog_count_amps($section);
$total_amp_pages = ceil($total_amps / $items_per_page);

/*
Pagination logic only checks $total_guitar_pages for now and loops out total pages based on $items_per_page setting at the top of the file 
*/

$pagination = "<nav aria-label=\"...\"><ul class=\"pagination pagination-sm justify-content-end\">";
for ($i = 1;$i <= $total_guitar_pages;$i++) {
    if ($i == $current_page) {
        $pagination .= "<li class=\"page-item active\" aria-current=\"page\"><span class=\"page-link\">$i</span></li>";
    } else {
        $pagination .= "<li class=\"page-item\"><a class=\"page-link\" href='index.php?show_all=true&";
        if (!empty($search)) {
            $pagination .= "s=".urlencode(htmlspecialchars($search))."&";
        } 
        $pagination .= "pg=$i'>$i</a></li>";
    }
}
$pagination .= "</ul></nav>";

// Limit results in redirect *unused*
// $limit_results = "";
// if (!empty($section)) {
//     $limit_results = "cat=" . $section . "&";
// }

// Redirect too-large page numbers to the last page
if ($current_page > $total_guitar_pages) {
    header("location:index.php?" . $limit_results . "pg=" . $total_guitar_pages);
}

// Redirect too-small page numbers to the first page
if ($current_page < 1) {
    header("location:index.php?" . $limit_results . "pg=1");
}

// Determine offset for the current page. E.g. Page 3 with 8 items per peage, offset is 16
$offset = ($current_page - 1) * $items_per_page;
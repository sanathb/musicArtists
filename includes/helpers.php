<?php
/* Helper functions goes here
 * @author Sanath
*/

/*
 * To get the array of pagination elements
 * 
 * @param $pageNo
 * @param $totalItems
 * @param $itemsPerPage
 */
function paginate($pageNo, $totalItems, $itemsPerPage) {
    
    $pageNo = (int)$pageNo;
    if($pageNo <=1)  {
        $pageNo = 1;
    }
    
    $lastPage      = ceil($totalItems/$itemsPerPage);     
    $nextPage = ($pageNo == $lastPage) ? NULL : ($pageNo + 1);
    
    $prevPage = ($pageNo == 1) ? NULL : ($pageNo - 1);
    
    return array("first" => 1,
                 "prev" => $prevPage,
                 "next" => $nextPage,
                 "last" => $lastPage,
                 "total" => $totalItems
                );
}

/*
 * To get a string that can be used for pagination in html page
 * 
 * @param $pagination array containing pagination elements - first,prev,next,last
 * @param $url the url to which the pagination elements will be added
 */
function getPaginatedString($pagination = array(), $url) {
    
    $paginateString = "";
    if( (($pagination['prev'] != 1) && ($pagination['first'] == $pagination['prev']))
     || ($pagination['prev'] === NULL)) {
        $paginateString .= "&lt;&lt; First &nbsp;&nbsp;&nbsp;&nbsp";
    } else {
        $paginateString .= '<a href="'. $url . $pagination['first'].'">&lt;&lt; First</a>&nbsp;&nbsp;&nbsp;&nbsp';
    }
    
    if($pagination['prev'] === NULL) {
        $paginateString .= "Prev &nbsp;&nbsp;&nbsp;&nbsp";
    } else {
        $paginateString .= '<a href="'. $url . $pagination['prev'].'">Prev</a>&nbsp;&nbsp;&nbsp;&nbsp';
    }
    
    if($pagination['next'] === NULL) {
        $paginateString .= "Next &nbsp;&nbsp;&nbsp;&nbsp";
    } else {
        $paginateString .= '<a href="'. $url . $pagination['next'].'">Next</a>&nbsp;&nbsp;&nbsp;&nbsp';
    }
    
    if( ($pagination['next'] === NULL)  ) {
        $paginateString .= "Last &gt;&gt;";
    } else {
        $paginateString .= '<a href="'. $url . $pagination['last'].'">Last &gt;&gt;</a> ';
    }
    
    return $paginateString;
}

/*
 * To get the image url from the set of image arrays
 * 
 * @param $images the array containing the image url and size name
 * @param $size the size of the image to be returned (small, medium, large, extralarge, mega)
 */
function getImageFromArray($images, $size) {
    foreach($images as $image) {
        if($image['size'] == $size) {
            return $image['#text'];
        }
    }
}

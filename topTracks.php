<?php
/*
 * @author Sanath
 * Script to get the top tracks of an artist
 */
?>
<?php if(empty($_GET['mbid'])): ?>
<html>
    <head><title>Bad request</title></head>
    Please enter a valid mbid
    </br> <a href="./index.php">Back</a>
</html>
<?php return; endif; ?>
<?php
require_once('./config/constants.php');
require_once('./includes/errorHandler.php');
require_once('./includes/helpers.php');

$itemsPerPage = 5; //number of results to be displayed per page
$pageNo = isset($_GET['page']) ? (int)$_GET['page'] : 1; //initial page

//get data from last.fm artist's top track API
$artistTracksData = file_get_contents(REST_API_BASE_URL.'?method=artist.gettoptracks&mbid='.$_GET['mbid'] . '&api_key='.LASTFM_API_KEY. '&format=json'. '&page='.$pageNo.'&limit='.$itemsPerPage);
$artistTracksData = json_decode($artistTracksData, true);

//error handling for the API response
if(isset($artistTracksData['error'])) {
    echo (ApiErrorHandler($artistTracksData));
    return;
}
?>
<center><b>Top Tracks</b></center>
<br>
<table border="1" align="center">
<tr>
<td>Rank</td>
<td>Track Name</td>
</tr>
<?php foreach($artistTracksData['toptracks']['track'] as $track): ?>
    <tr>
    <td><?php echo $track['@attr']['rank']; ?></td>
    <td><a href="<?php echo $track['url'];?>"><?php echo $track['name'];?></a></td>
    </tr>
<?php endforeach; ?>
</table>
<center>
<?php
//Pagination
$pagination = paginate($pageNo, $artistTracksData['toptracks']['@attr']['total'], $itemsPerPage);
echo  "<br> Diaplaying Page ". $pageNo ." of " . $artistTracksData['toptracks']['@attr']['totalPages'];
echo "<br><br>";
echo getPaginatedString($pagination, $_SERVER['PHP_SELF'] . '?mbid='. $_GET['mbid'] . '&page=');
?>
</center>

<?php
/*
 * @author Sanath
 * Script to enter a country name and get the top artists
 */
?>
<?php if(empty($_GET['country'])): ?>
<html>
    <head><title>Bad request</title></head>
    Please enter a search term
    <br><br><a href="./index.php">Back</a>
</html>
<?php return; endif; ?>
<?php
require_once('./config/constants.php');
require_once('./includes/errorHandler.php');
require_once('./includes/helpers.php');

$itemsPerPage = 5; //number of results to be displayed per page
$pageNo = isset($_GET['page']) ? (int)$_GET['page'] : 1; //initial page

//get data from last.fm geo top artists API
$artistData = file_get_contents(REST_API_BASE_URL.'?method=geo.gettopartists&country='.$_GET['country'] . '&api_key='.LASTFM_API_KEY. '&format=json'. '&page='.$pageNo.'&limit='.$itemsPerPage);
$artistData = json_decode($artistData, true);

//error handling for the API response
if(isset($artistData['error'])) {
    echo (ApiErrorHandler($artistData));
    return;
}
?>
<center><b>Top Artists for <?php  echo strtoupper($_GET['country']); ?></b></center>
<br>
<table border="1" align="center">
<tr>
<td>Artist Name</td>
<td>Image</td>
</tr>
<?php foreach($artistData['topartists']['artist'] as $artist): ?>
    <tr>
    <td><?php echo $artist['name']; ?></td>
    <td><a href="./topTracks.php?mbid=<?php echo $artist['mbid'];?>"><img src="<?php echo getImageFromArray($artist['image'], 'medium'); ?>"></a></td>
    </tr>
<?php endforeach; ?>
</table>
<center>
<?php
//Pagination
$pagination = paginate($pageNo, $artistData['topartists']['@attr']['total'], $itemsPerPage);
echo  "<br> Diaplaying Page ". $pageNo ." of " . $artistData['topartists']['@attr']['totalPages'];
echo "<br><br>";
echo getPaginatedString($pagination, $_SERVER['PHP_SELF'] . '?country='. $_GET['country'] . '&page=');
?>
</center>

<?php
	$google_maps_origin = $paths[0]['Routing']['address'];
	$google_maps_dest = $paths[count($paths) - 1]['Routing']['address'];
	$ymaps_routes = [];	
	
	foreach($paths as $item) {
		$ymaps_routes[] = $item['Routing']['address'];
	}

    $this->start('page_title');
    echo "Маршрутний лист &mdash; ".$driver['Driver']['name'];
    $this->end();
?>


<?php
    $this->start('breadcrumb');
    echo $this->element('parts/breadcrumb', [
        'items' => [
            '/routings' => 'Маршрутний лист',
			'/routings/driver/'.$driver['Driver']['id'] => $this->fetch('page_title')
        ]
    ]);
    $this->end();
?>

<div class='row'>
    <div class='col-md-12'>
        <div class="card">
            <div class="card-header">
                <strong>Водій:</strong> <?= $driver['Driver']['name']; ?>				
            </div>
            
            <div class="card-block">
				<?= $this->element('parts/print-button'); ?>
				
                <?php
					if(empty($paths)) {
						echo "<p class='text-muted'>Маршрутів немає ця цього водія</p>";
					} else {
						echo "<ul>";
						
						foreach($paths as $item) {
							echo "<li>".$item['Routing']['address']."</li>";
						}
						
						echo "</ul>";
					}
				?>
			
				<div id="map" style="height: 500px; width: 100%"></div>
            </div>
        </div>
    </div>
</div>

<?php $this->start('scripts'); ?>
<script src="https://api-maps.yandex.ru/2.1/?lang=uk_UA" type="text/javascript"></script>
<script type="text/javascript">
	var arr = $.map(<?= json_encode($ymaps_routes); ?>, function(el) { return el });
	
	ymaps.ready(function () {		
		var myGeocoder = ymaps.geocode(arr[0]);
		myGeocoder.then(
			function (res) {
				var map = new ymaps.Map('map', { 
					center: res.geoObjects.get(0).geometry.getCoordinates(), 
					zoom: 14,
					controls: ["fullscreenControl", "zoomControl", "rulerControl"]
				});
				
				ymaps.route(arr).then(
					function (route) {
						map.geoObjects.add(route);
					},
					function (error) {
						alert('Возникла ошибка: ' + error.message);
					}
				);;
			}			
		);
		
	});
</script>
<?php $this->end('scripts'); ?>
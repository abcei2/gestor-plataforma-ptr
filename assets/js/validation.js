function fillDriversData()
{
	var url = 'assets/php/driverData.php';
	var width = '510';
	var height = '370';
	var windowSize = 'width='+width+',height='+height;
	window.open(url,'Datos del conductor',windowSize);
};

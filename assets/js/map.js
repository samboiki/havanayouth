var map;
jQuery(document).ready(function(){

    map = new GMaps({
        div: '#map',
        lat: -22.555033, 
        lng:  17.072061,
    });
    map.addMarker({
        lat: -22.555033, 
        lng:  17.072061,
        title: 'Address',      
        infoWindow: {
            content: '<h5 class="title">NMRC Offices</h5><p><span class="region">Address line goes here</span><br><span class="postal-code">Khomas</span><br><span class="country-name">Namibia</span></p>'
        }
    });

});
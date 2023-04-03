const apiKey = '8a2267d365bdce88bcb6fa2e8c016818'; // Replace with your OpenWeatherMap API key


document.addEventListener('DOMContentLoaded', function () {
    // Add your JavaScript code here

    // Initialize the weather map
    function initWeatherMap() {
        const latitude = 32.7157; // Latitude for San Diego
        const longitude = -117.1611; // Longitude for San Diego
        const zoom = 6; // Zoom level for the map

        const map = L.map('weather-map').setView([latitude, longitude], zoom);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.tileLayer(`https://{s}.tile.openweathermap.org/map/temp_new/{z}/{x}/{y}.png?appid={apiKey}`, {
            attribution: 'Map data &copy; <a href="https://www.openweathermap.org/">OpenWeatherMap</a>',
            maxZoom: 18,
            id: 'openweathermap.temp_new',
            tileSize: 512,
            zoomOffset: -1,
            apiKey: apiKey
        }).addTo(map);
    }

    // Call the initWeatherMap function
    initWeatherMap();
});



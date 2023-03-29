//openweathermap.org
const API_KEY = '8a2267d365bdce88bcb6fa2e8c016818';
//opencagedata.com
const GEO_CODE = '526604b1019546f28baf952e818a993e';
const locationForm = document.getElementById('location-form');
const weatherContainer = document.getElementById('weather-container');


async function getWeatherForLocation(location) {
    const { lat, lng } = await fetchLatLng(location);
    if (lat && lng) {
        fetchWeatherForecast(lat, lng)
            .then((data) => {
                weatherContainer.innerHTML = '';
                displayWeatherForecast(data);
            })
            .catch((error) => console.error('Error fetching weather data:', error));
    } else {
        console.error('Error fetching coordinates for location:', location);
    }
}

locationForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const locationInput = document.getElementById('location-input');
    const location = locationInput.value.trim();

    if (location) {
        getWeatherForLocation(location);
    }
});

async function fetchLatLng(location) {
    const response = await fetch(`https://api.opencagedata.com/geocode/v1/json?q=${encodeURIComponent(location)}&key=${GEO_CODE}`);
    const data = await response.json();
    if (data.results && data.results.length > 0) {
        const { lat, lng } = data.results[0].geometry;
        return { lat, lng };
    } else {
        return {};
    }
}

async function fetchWeatherForecast(lat, lng) {
    const response = await fetch(`https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lng}&exclude=minutely,hourly,alerts&units=imperial&appid=${API_KEY}`);
    const data = await response.json();
    return data;
}

function displayWeatherForecast(forecastData) {
    const dailyData = forecastData.daily;

    dailyData.forEach(day => {
        const date = new Date(day.dt * 1000);
        const weatherCard = document.createElement('div');
        weatherCard.classList.add('weather-card');

        weatherCard.innerHTML = `
        <h2>${date.toDateString()}</h2>
        <p>Temperature: ${day.temp.day}°F</p>
        <p>Weather: ${day.weather[0].description}</p>
      `;

        weatherContainer.appendChild(weatherCard);
    });
}

// Call the function with a default location when the page loads
getWeatherForLocation('New York');

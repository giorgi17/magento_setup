define([
    'uiComponent',
    'ko',
    'jquery',
    'mage/url',
    'Devall_WeatherApp/js/model/city-weather-info',
], function (
    Component,
    ko,
    $,
    url,
    singleDataDisplayModel,
) {
   'use strict';

   return Component.extend({
       initialize() {
           this._super();

           console.log("Devall Weather initialized!");
       },
       getCityData() {
           $('body').trigger('processStart');
           const inputValue = $('input[name=city]').val();

           $.ajax({
               url: this.getWeatherUrl(),
               method: 'POST',
               dataType: 'json',
               data: { city: inputValue, },
               success: (response) => {
                   console.log("getCityDataSubmit", response)
                   if (response.success.cod !== '404') {
                       this.setFetchedDataDisplay(response.success);
                       this.saveHistoricalData(response.success);
                   }
               },
               error: function (err) {
                   console.log("getCityDataError", err)
               },
               complete: function () {
                   $('body').trigger('processStop');
               }
           })
       },
       getWeatherUrl() {
           return url.build('weather/index/current');
       },
       getSaveHistoricalWeatherDataUrl() {
           return url.build('weather/index/save');
       },
       setFetchedDataDisplay(fetchedData) {
           singleDataDisplayModel.city(fetchedData.name);
           singleDataDisplayModel.country(fetchedData.sys.country);
           singleDataDisplayModel.description(fetchedData.weather[0].description);
           singleDataDisplayModel.temperature(fetchedData.main.temp);
           singleDataDisplayModel.feelsLike(fetchedData.main.feels_like);
           singleDataDisplayModel.pressure(fetchedData.main.pressure);
           singleDataDisplayModel.humidity(fetchedData.main.humidity);
           singleDataDisplayModel.windspeed(fetchedData.wind.speed);
           singleDataDisplayModel.sunrise(new Date(fetchedData.sys.sunrise * 1000).toISOString()
               .replace('T', ' ').replace(/\.\d+Z$/, ''));
           singleDataDisplayModel.sunset(new Date (fetchedData.sys.sunset * 1000).toISOString()
               .replace('T', ' ').replace(/\.\d+Z$/, ''));
       },
       saveHistoricalData(fetchedData) {
           $.ajax({
               url: this.getSaveHistoricalWeatherDataUrl(),
               method: 'POST',
               dataType: 'json',
               data: {
                   city: fetchedData.name,
                   country: fetchedData.sys.country,
                   description: fetchedData.weather[0].description,
                   temperature: fetchedData.main.temp,
                   feelsLike: fetchedData.main.feels_like,
                   pressure: fetchedData.main.pressure,
                   humidity: fetchedData.main.humidity,
                   windspeed: fetchedData.wind.speed,
                   sunrise: new Date(fetchedData.sys.sunrise * 1000).toISOString(),
                   sunset: new Date (fetchedData.sys.sunset * 1000).toISOString(),
               },
               success: (response) => {
                   console.log("saveHistoricalData", response)
               },
               error: function (err) {
                   console.log("saveHistoricalDataError", err)
               },
           })
       }
   })
})

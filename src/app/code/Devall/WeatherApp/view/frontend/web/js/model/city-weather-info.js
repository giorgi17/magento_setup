define([
    'ko'
], function (
    ko
) {
    return {
        city: ko.observable(""),
        country: ko.observable(""),
        description: ko.observable(""),
        temperature: ko.observable(0),
        feelsLike: ko.observable(0),
        pressure: ko.observable(0),
        humidity: ko.observable(0),
        windspeed: ko.observable(0),
        sunrise: ko.observable(""),
        sunset: ko.observable(""),
    };
})

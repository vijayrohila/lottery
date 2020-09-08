/**
 * jquery.geocomplete v2.1.1 (https://github.com/tmentink/jquery.geocomplete)
 * Copyright 2017-2019 Trent Mentink
 * Licensed under MIT
 */

(function () {
  'use strict';

  function _classCallCheck(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError("Cannot call a class as a function");
    }
  }

  function _defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];
      descriptor.enumerable = descriptor.enumerable || false;
      descriptor.configurable = true;
      if ("value" in descriptor) descriptor.writable = true;
      Object.defineProperty(target, descriptor.key, descriptor);
    }
  }

  function _createClass(Constructor, protoProps, staticProps) {
    if (protoProps) _defineProperties(Constructor.prototype, protoProps);
    if (staticProps) _defineProperties(Constructor, staticProps);
    return Constructor;
  }

  function _defineProperty(obj, key, value) {
    if (key in obj) {
      Object.defineProperty(obj, key, {
        value: value,
        enumerable: true,
        configurable: true,
        writable: true
      });
    } else {
      obj[key] = value;
    }

    return obj;
  }

  var logError = function logError(msg) {
    console.error(msg);
  };

  var SPACES = /\s+/g;
  var SPACES_AND_UNDERSCORES = /\s+|_+/g;

  var $ = window.jquery || window.$;

  var NAME = 'geocomplete';
  var DATA_KEY = "gmap.".concat(NAME);
  var EVENT_KEY = ".".concat(DATA_KEY);
  var Events = {
    FOCUS: "focus".concat(EVENT_KEY),
    PLACE_CHANGED: 'place_changed'
  };

  var _Defaults;
  var Settings = {
    APPEND_TO_PARENT: 'appendToParent',
    FORMATS: 'formats',
    FORM_ID: 'formId',
    GEOLOCATE: 'geolocate',
    INPUT_DATA_KEY: 'inputDataKey',
    MAP: 'map',
    ON_CHANGE: 'onChange',
    ON_NO_RESULT: 'onNoResult'
  };
  var Formats = {
    LAT: function LAT(placeResult) {
      var location = placeResult.getLocation();
      return location.lat();
    },
    LAT_LNG: function LAT_LNG(placeResult) {
      var location = placeResult.getLocation();
      return location.toUrlValue();
    },
    LNG: function LNG(placeResult) {
      var location = placeResult.getLocation();
      return location.lng();
    },
    STREET_ADDRESS: function STREET_ADDRESS(placeResult) {
      var streetNumber = placeResult.getComponentValue('street number');
      var street = placeResult.getComponentValue('street');
      return "".concat(streetNumber, " ").concat(street);
    }
  };
  var Defaults = (_Defaults = {}, _defineProperty(_Defaults, Settings.APPEND_TO_PARENT, true), _defineProperty(_Defaults, Settings.FORMATS, Formats), _defineProperty(_Defaults, Settings.FORM_ID, null), _defineProperty(_Defaults, Settings.GEOLOCATE, false), _defineProperty(_Defaults, Settings.INPUT_DATA_KEY, 'geocomplete'), _defineProperty(_Defaults, Settings.MAP, null), _defineProperty(_Defaults, Settings.ON_CHANGE, function () {}), _defineProperty(_Defaults, Settings.ON_NO_RESULT, function () {}), _Defaults);
  var getExtendedSettings = function getExtendedSettings(userSettings) {
    var localSettings = $.fn[NAME].settings;
    if (typeof userSettings === 'string') userSettings = {};
    return $.extend(true, {}, Defaults, localSettings, userSettings);
  };
  var getFormats = function getFormats() {
    return $.fn[NAME].settings[Settings.FORMATS];
  };

  var lookup = function lookup(_ref) {
    var obj = _ref.obj,
        query = _ref.query;
    query = query.toLowerCase().replace(SPACES_AND_UNDERSCORES, '');
    var key = Object.keys(obj).find(function (k) {
      k = k.toLowerCase().replace(SPACES_AND_UNDERSCORES, '');
      return k === query;
    });
    return obj[key];
  };

  var Properties = {
    LONG_NAME: 'long_name',
    SHORT_NAME: 'short_name',
    TYPES: 'types'
  };
  var Types = {
    ADMINISTRATIVE_AREA_LEVEL_1: 'administrative_area_level_1',
    ADMINISTRATIVE_AREA_LEVEL_2: 'administrative_area_level_2',
    ADMINISTRATIVE_AREA_LEVEL_3: 'administrative_area_level_3',
    ADMINISTRATIVE_AREA_LEVEL_4: 'administrative_area_level_4',
    ADMINISTRATIVE_AREA_LEVEL_5: 'administrative_area_level_5',
    AIRPORT: 'airport',
    COLLOQUIAL_AREA: 'colloquial_area',
    COUNTRY: 'country',
    INTERSECTION: 'intersection',
    LOCALITY: 'locality',
    NATURAL_FEATURE: 'natural_feature',
    NEIGHBORHOOD: 'neighborhood',
    PARK: 'park',
    POINT_OF_INTEREST: 'point_of_interest',
    POLITICAL: 'political',
    POSTAL_CODE: 'postal_code',
    POSTAL_CODE_SUFFIX: 'postal_code_suffix',
    PREMISE: 'premise',
    ROUTE: 'route',
    STREET_NUMBER: 'street_number',
    SUBLOCALITY: 'sublocality',
    SUBPREMISE: 'subpremise'
  };
  var TypeAliases = {
    CITY: Types.LOCALITY,
    COUNTY: Types.ADMINISTRATIVE_AREA_LEVEL_2,
    STATE: Types.ADMINISTRATIVE_AREA_LEVEL_1,
    STREET: Types.ROUTE,
    ZIP_CODE: Types.POSTAL_CODE,
    ZIP_CODE_SUFFIX: Types.POSTAL_CODE_SUFFIX
  };
  var getName = function getName(addressType) {
    var formatted = addressType.toLowerCase().replace(SPACES, '');
    var isShort = formatted.indexOf('short') !== -1;
    return isShort ? Properties.SHORT_NAME : Properties.LONG_NAME;
  };
  var getType = function getType(addressType) {
    var formatted = addressType.toLowerCase().replace('short', '').replace(SPACES_AND_UNDERSCORES, '');
    var value = lookupTypeAlias(formatted);
    if (value == null) value = lookupType(formatted);
    return value;
  };
  function lookupType(query) {
    return lookup({
      obj: Types,
      query: query
    });
  }
  function lookupTypeAlias(query) {
    return lookup({
      obj: TypeAliases,
      query: query
    });
  }

  var Properties$1 = {
    ADDRESS_COMPONENTS: 'address_components',
    ADR_ADDRESS: 'adr_address',
    ASPECTS: 'aspects',
    FORMATTED_ADDRESS: 'formatted_address',
    FORMATTED_PHONE_NUMBER: 'formatted_phone_number',
    GEOMETRY: 'geometry',
    HTML_ATTRIBUTIONS: 'html_attributions',
    ICON: 'icon',
    INTERNATIONAL_PHONE_NUMBER: 'international_phone_number',
    NAME: 'name',
    OPENING_HOURS: 'opening_hours',
    PERMANENTLY_CLOSED: 'permanently_closed',
    PHOTOS: 'photos',
    PLACE_ID: 'place_id',
    PLUS_CODE: 'plus_code',
    PRICE_LEVEL: 'price_level',
    RATING: 'rating',
    REVIEWS: 'reviews',
    TYPES: 'types',
    URL: 'url',
    USER_RATINGS_TOTAL: 'user_ratings_total',
    UTC_OFFSET: 'utc_offset',
    VICINITY: 'vicinity',
    WEBSITE: 'website'
  };
  var PlaceResult =
  function () {
    function PlaceResult(placeResult) {
      var _this = this;
      _classCallCheck(this, PlaceResult);
      this.isEmpty = isEmptyResult(placeResult);
      this.timestamp = new Date().toString();
      if (!this.isEmpty) Object.values(Properties$1).forEach(function (prop) {
        _this[prop] = placeResult[prop];
      });
    }
    _createClass(PlaceResult, [{
      key: "getComponentValue",
      value: function getComponentValue(query) {
        var name = getName(query);
        var type = getType(query);
        var component = findAddressComponent({
          components: this[Properties$1.ADDRESS_COMPONENTS],
          type: type
        });
        if (component == null) {
          logError("".concat(query, " was not found in the results"));
          return '';
        }
        return component[name];
      }
    }, {
      key: "getFormatValue",
      value: function getFormatValue(query) {
        var format = lookupFormat(query);
        if (format != null) return format(this);
      }
    }, {
      key: "getPropertyValue",
      value: function getPropertyValue(query) {
        var prop = lookupProperty(query);
        if (prop != null) return this[prop];
      }
    }, {
      key: "getLocation",
      value: function getLocation() {
        var geometry = this[Properties$1.GEOMETRY] || {};
        return geometry.location;
      }
    }, {
      key: "getValue",
      value: function getValue(query) {
        var format = lookupFormat(query);
        if (format != null) return format(this);
        var prop = lookupProperty(query);
        if (prop != null) return this[prop];
        return this.getComponentValue(query);
      }
    }, {
      key: "getViewport",
      value: function getViewport() {
        var geometry = this[Properties$1.GEOMETRY] || {};
        return geometry.viewport;
      }
    }]);
    return PlaceResult;
  }();
  function findAddressComponent(_ref) {
    var components = _ref.components,
        type = _ref.type;
    return components.find(function (c) {
      return c.types[0] === type;
    });
  }
  function isEmptyResult(placeResult) {
    return Object.keys(placeResult).length <= 1;
  }
  function lookupFormat(query) {
    return lookup({
      obj: getFormats(),
      query: query
    });
  }
  function lookupProperty(query) {
    return lookup({
      obj: Properties$1,
      query: query
    });
  }

  var isGoogleMap = function isGoogleMap(val) {
    return val instanceof window.google.maps.Map;
  };
  var isLatLng = function isLatLng(val) {
    return val instanceof window.google.maps.LatLng;
  };
  var isLatLngBounds = function isLatLngBounds(val) {
    return val instanceof window.google.maps.LatLngBounds;
  };
  var isPlaceResult = function isPlaceResult(val) {
    return val instanceof PlaceResult;
  };

  var Input =
  function () {
    function Input(_ref) {
      var element = _ref.element,
          form = _ref.form;
      _classCallCheck(this, Input);
      var inputDataKey = form.inputDataKey;
      this.$element = $(element);
      this.dataKey = this.$element.data(inputDataKey);
      this.element = element;
      this.form = form;
      this.type = getType$1(element);
      this.value = null;
    }
    _createClass(Input, [{
      key: "clear",
      value: function clear() {
        var _this = this;
        var Types = {
          INPUT: function INPUT() {
            _this.$element.val('');
          },
          SELECT: function SELECT() {
            _this.$element.val('');
          },
          SEMANTIC_DROPDOWN: function SEMANTIC_DROPDOWN() {
            _this.$element.dropdown('clear');
          }
        };
        this.value = null;
        return Types[this.type]();
      }
    }, {
      key: "setValue",
      value: function setValue(value) {
        var _this2 = this;
        var Types = {
          INPUT: function INPUT(value) {
            _this2.$element.val(value);
          },
          SELECT: function SELECT(value) {
            var index = $("option:contains(".concat(value, ")"), _this2.$element)[0].index;
            _this2.$element.prop('selectedIndex', index);
          },
          SEMANTIC_DROPDOWN: function SEMANTIC_DROPDOWN(value) {
            _this2.$element.dropdown('set selected', value);
          }
        };
        this.value = value;
        return Types[this.type](value);
      }
    }]);
    return Input;
  }();
  function getType$1(element) {
    return isSemanticDropdown(element) ? 'SEMANTIC_DROPDOWN' : element.nodeName;
  }
  function isSemanticDropdown(element) {
    var eClasses = element.classList;
    var pClasses = element.parentElement.classList;
    return eClasses.contains('ui') && eClasses.contains('dropdown') || pClasses.contains('ui') && pClasses.contains('dropdown');
  }

  var Form =
  function () {
    function Form(geocomplete, settings) {
      _classCallCheck(this, Form);
      this.id = settings[Settings.FORM_ID];
      this.element = document.getElementById(this.id.replace('#', ''));
      this.geocomplete = geocomplete;
      this.inputDataKey = settings[Settings.INPUT_DATA_KEY];
      this.inputs = [];
      this.createInputs();
    }
    _createClass(Form, [{
      key: "createInputs",
      value: function createInputs() {
        var _this = this;
        this.inputs = [];
        var query = "[data-".concat(this.inputDataKey, "]");
        var inputElements = this.element.querySelectorAll(query);
        inputElements.forEach(function (element) {
          _this.inputs.push(new Input({
            element: element,
            form: _this
          }));
        });
      }
    }, {
      key: "clear",
      value: function clear() {
        this.inputs.forEach(function (input) {
          return input.clear();
        });
        return this.geocomplete.$element;
      }
    }, {
      key: "fill",
      value: function fill(placeResult) {
        this.clear();
        if (!isPlaceResult(placeResult)) {
          placeResult = new PlaceResult(placeResult);
        }
        this.inputs.forEach(function (input) {
          var value = placeResult.getValue(input.dataKey);
          input.setValue(value);
        });
        return this.geocomplete.$element;
      }
    }, {
      key: "getValues",
      value: function getValues(query) {
        var values = {};
        this.inputs.forEach(function (input) {
          values[input.dataKey] = input.value;
        });
        return query ? values[query] : values;
      }
    }]);
    return Form;
  }();

  var StyleSheet =
  function () {
    function StyleSheet() {
      _classCallCheck(this, StyleSheet);
      this.styleSheet = document.createElement('style');
      this.styleSheet.type = 'text/css';
      document.head.appendChild(this.styleSheet);
    }
    _createClass(StyleSheet, [{
      key: "addCSS",
      value: function addCSS(css) {
        this.styleSheet.innerHTML += css;
      }
    }]);
    return StyleSheet;
  }();

  var Options = {
    BOUNDS: 'bounds',
    COMPONENT_RESTRICTIONS: 'componentRestrictions',
    FIELDS: 'fields',
    PLACE_ID_ONLY: 'placeIdOnly',
    STRICT_BOUNDS: 'strictBounds',
    TYPES: 'types'
  };
  var Autocomplete =
  function () {
    function Autocomplete(geocomplete, settings) {
      _classCallCheck(this, Autocomplete);
      var options = getOptions(settings);
      this.$element = geocomplete.$element;
      this.eventListeners = [];
      this.geocomplete = geocomplete;
      this.obj = new window.google.maps.places.Autocomplete(this.$element[0], options);
    }
    _createClass(Autocomplete, [{
      key: "addListener",
      value: function addListener(eventName, handler) {
        var listener = this.obj.addListener(eventName, handler);
        this.eventListeners.push(listener);
        return listener;
      }
    }, {
      key: "getBounds",
      value: function getBounds() {
        return this.obj.getBounds();
      }
    }, {
      key: "getFields",
      value: function getFields() {
        return this.obj.getFields();
      }
    }, {
      key: "getPlace",
      value: function getPlace() {
        return this.obj.getPlace();
      }
    }, {
      key: "removeListeners",
      value: function removeListeners() {
        this.eventListeners.forEach(function (e) {
          return e.remove();
        });
        return this.$element;
      }
    }, {
      key: "setBounds",
      value: function setBounds(parms) {
        this.obj.setBounds(parms);
        return this.$element;
      }
    }, {
      key: "setComponentRestrictions",
      value: function setComponentRestrictions(parms) {
        this.obj.setComponentRestrictions(parms);
        return this.$element;
      }
    }, {
      key: "setFields",
      value: function setFields(parms) {
        this.obj.setFields(parms);
        return this.$element;
      }
    }, {
      key: "setOptions",
      value: function setOptions(parms) {
        this.obj.setOptions(parms);
        return this.$element;
      }
    }, {
      key: "setTypes",
      value: function setTypes(parms) {
        this.obj.setTypes(parms);
        return this.$element;
      }
    }]);
    return Autocomplete;
  }();
  function getOptions(settings) {
    var options = {};
    var AutocompleteOptions = Object.values(Options);
    Object.keys(settings).forEach(function (key) {
      if (AutocompleteOptions.indexOf(key) !== -1) {
        options[key] = settings[key];
      }
    });
    return options;
  }

  var PacContainer = function PacContainer(geocomplete, settings) {
    var _this = this;
    _classCallCheck(this, PacContainer);
    this.element = null;
    this.geocomplete = geocomplete;
    this.styleSheet = geocomplete.styleSheet;
    if (settings[Settings.APPEND_TO_PARENT]) {
      var _this$geocomplete = this.geocomplete,
          $geo = _this$geocomplete.$element,
          index = _this$geocomplete.index;
      $geo.on(Events.FOCUS, function () {
        _this.element = document.getElementsByClassName('pac-container')[index];
        if (_this.element != null) {
          appendToParent({
            $geo: $geo,
            element: _this.element,
            styleSheet: _this.styleSheet
          });
          $geo.off(Events.FOCUS);
        }
      });
    }
  };
  function appendToParent(_ref) {
    var $geo = _ref.$geo,
        element = _ref.element,
        styleSheet = _ref.styleSheet;
    var left = "".concat(calcLeftPosition($geo), "px !important");
    var top = "".concat(calcTopPosition($geo), "px !important");
    element.id = "pac-container_".concat($geo[0].id);
    styleSheet.addCSS("#".concat(element.id, "{top:").concat(top, "; left:").concat(left, ";}"));
    $geo.parent().css({
      position: 'relative'
    }).append(element);
  }
  function calcLeftPosition($geo) {
    var element_left = $geo.offset().left;
    var parent_left = $geo.parent().offset().left;
    return element_left - parent_left;
  }
  function calcTopPosition($geo) {
    var element_top = $geo.offset().top;
    var element_height = $geo.outerHeight();
    var parent_top = $geo.parent().offset().top;
    return element_top - parent_top + element_height;
  }

  var Index = -1;
  var GlobalStyleSheet = new StyleSheet();
  var Geocomplete =
  function () {
    function Geocomplete($element, userSettings) {
      var _this = this;
      _classCallCheck(this, Geocomplete);
      var settings = getExtendedSettings(userSettings);
      this.$element = $element;
      this.form = null;
      this.index = Index += 1;
      this.map = settings[Settings.MAP];
      this.placeResult = null;
      this.styleSheet = GlobalStyleSheet;
      this.autocomplete = new Autocomplete(this, settings);
      this.pacContainer = new PacContainer(this, settings);
      if (settings[Settings.FORM_ID]) this.form = new Form(this, settings);
      this.autocomplete.addListener(Events.PLACE_CHANGED, function () {
        var $element = _this.$element;
        var rawResult = _this.getplace();
        if (_this.placeResult.isEmpty) return settings[Settings.ON_NO_RESULT].call($element, rawResult.name);
        settings[Settings.ON_CHANGE].call($element, rawResult.name, rawResult);
        _this.centermap();
        _this.fillform();
      });
      if (settings[Settings.GEOLOCATE]) this.geolocate();
    }
    _createClass(Geocomplete, [{
      key: "centermap",
      value: function centermap(bounds) {
        if (this.map == null || !isGoogleMap(this.map)) return;
        if (bounds == null) {
          if (this.placeResult == null) this.getplace();
          var location = this.placeResult.getLocation();
          var viewport = this.placeResult.getViewport();
          bounds = viewport || location;
        }
        if (isLatLngBounds(bounds)) {
          this.map.fitBounds(bounds);
          return this.$element;
        }
        if (isLatLng(bounds)) {
          this.map.setCenter(bounds);
          return this.$element;
        }
      }
    }, {
      key: "clearform",
      value: function clearform() {
        if (this.form == null) return;
        return this.form.clear();
      }
    }, {
      key: "destroy",
      value: function destroy() {
        this.$element.removeData(DATA_KEY);
        this.autocomplete.removeListeners();
      }
    }, {
      key: "fillform",
      value: function fillform(placeResult) {
        if (this.form == null) return;
        placeResult = placeResult || this.placeResult;
        return this.form.fill(placeResult);
      }
    }, {
      key: "geolocate",
      value: function geolocate() {
        var _this2 = this;
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function (position) {
            var circle = new window.google.maps.Circle({
              center: {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              },
              radius: position.coords.accuracy
            });
            _this2.autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    }, {
      key: "getcachedplace",
      value: function getcachedplace() {
        return this.placeResult;
      }
    }, {
      key: "getformvalues",
      value: function getformvalues(query) {
        if (this.form == null) return;
        return this.form.getValues(query);
      }
    }, {
      key: "getbounds",
      value: function getbounds() {
        return this.autocomplete.getBounds();
      }
    }, {
      key: "getfields",
      value: function getfields() {
        return this.autocomplete.getFields();
      }
    }, {
      key: "getplace",
      value: function getplace() {
        var rawResult = this.autocomplete.getPlace();
        this.placeResult = new PlaceResult(rawResult);
        return rawResult;
      }
    }, {
      key: "setbounds",
      value: function setbounds(parms) {
        return this.autocomplete.setBounds(parms);
      }
    }, {
      key: "setcomponentrestrictions",
      value: function setcomponentrestrictions(parms) {
        return this.autocomplete.setComponentRestrictions(parms);
      }
    }, {
      key: "setfields",
      value: function setfields(parms) {
        return this.autocomplete.setFields(parms);
      }
    }, {
      key: "setoptions",
      value: function setoptions(parms) {
        return this.autocomplete.setOptions(parms);
      }
    }, {
      key: "settypes",
      value: function settypes(parms) {
        return this.autocomplete.setTypes(parms);
      }
    }], [{
      key: "_jQueryInterface",
      value: function _jQueryInterface(userSettings, parms) {
        var $element = $(this);
        var geo = $element.data(DATA_KEY);
        if (!geo) {
          geo = new Geocomplete($element, userSettings);
          $element.data(DATA_KEY, geo);
        }
        if (typeof userSettings === 'string') {
          var method = userSettings.toLowerCase().replace(SPACES, '');
          if (geo[method]) return geo[method](parms);
          logError("\"".concat(userSettings, "\" is not a valid method"));
        }
        return this;
      }
    }]);
    return Geocomplete;
  }();
  $.fn[NAME] = Geocomplete._jQueryInterface;
  $.fn[NAME].Constructor = Geocomplete;
  $.fn[NAME].settings = Defaults;

}());

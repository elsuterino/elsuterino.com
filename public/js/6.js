(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[6],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/Portfolio.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Pages/Portfolio.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Shared_Layout__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../Shared/Layout */ "./resources/js/Shared/Layout.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


var md = __webpack_require__(/*! markdown-it */ "./node_modules/markdown-it/index.js")();

/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    projects: Array
  },
  metaInfo: {
    title: 'El Suterino',
    titleTemplate: '%s - Portfolio'
  },
  data: function data() {
    return {
      activeTab: 0
    };
  },
  layout: function layout(h, page) {
    return h(_Shared_Layout__WEBPACK_IMPORTED_MODULE_0__["default"], [page]);
  },
  methods: {
    render: function render(markdown) {
      return md.render(markdown);
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/Portfolio.vue?vue&type=template&id=0a1941ef&":
/*!*******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Pages/Portfolio.vue?vue&type=template&id=0a1941ef& ***!
  \*******************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("section", { staticClass: "section" }, [
    _c(
      "div",
      { staticClass: "container" },
      [
        _c("h2", { staticClass: "title is-2" }, [_vm._v("Portfolio")]),
        _vm._v(" "),
        _c(
          "b-tabs",
          {
            model: {
              value: _vm.activeTab,
              callback: function($$v) {
                _vm.activeTab = $$v
              },
              expression: "activeTab"
            }
          },
          _vm._l(_vm.projects, function(project) {
            return _c(
              "b-tab-item",
              { key: project.id, attrs: { label: project.title } },
              [
                _c("article", { staticClass: "media portfolio" }, [
                  _c("figure", { staticClass: "media-left" }, [
                    _c("div", { staticClass: "image" }, [
                      _c("img", {
                        attrs: { alt: project.title, srcset: project.src_set }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "media-content" }, [
                    _c("div", {
                      staticClass: "content",
                      domProps: { innerHTML: _vm._s(_vm.render(project.body)) }
                    }),
                    _vm._v(" "),
                    _c("nav", { staticClass: "level is-mobile" }, [
                      _c("div", { staticClass: "level-left" }, [
                        project.github
                          ? _c(
                              "a",
                              {
                                staticClass: "level-item",
                                attrs: {
                                  href: project.github,
                                  target: "_blank"
                                }
                              },
                              [
                                _c(
                                  "span",
                                  { staticClass: "icon" },
                                  [
                                    _c("font-awesome-icon", {
                                      attrs: { icon: ["fab", "github"] }
                                    })
                                  ],
                                  1
                                ),
                                _vm._v(" "),
                                _c("span", [_vm._v("GitHub")])
                              ]
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        project.website
                          ? _c(
                              "a",
                              {
                                staticClass: "level-item",
                                attrs: {
                                  href: project.website,
                                  target: "_blank"
                                }
                              },
                              [
                                _c(
                                  "span",
                                  { staticClass: "icon" },
                                  [
                                    _c("font-awesome-icon", {
                                      attrs: { icon: ["fas", "globe"] }
                                    })
                                  ],
                                  1
                                ),
                                _vm._v(" "),
                                _c("span", [_vm._v("Website")])
                              ]
                            )
                          : _vm._e()
                      ])
                    ])
                  ])
                ])
              ]
            )
          }),
          1
        )
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/Pages/Portfolio.vue":
/*!******************************************!*\
  !*** ./resources/js/Pages/Portfolio.vue ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Portfolio_vue_vue_type_template_id_0a1941ef___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Portfolio.vue?vue&type=template&id=0a1941ef& */ "./resources/js/Pages/Portfolio.vue?vue&type=template&id=0a1941ef&");
/* harmony import */ var _Portfolio_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Portfolio.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Portfolio.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Portfolio_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Portfolio_vue_vue_type_template_id_0a1941ef___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Portfolio_vue_vue_type_template_id_0a1941ef___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Portfolio.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Portfolio.vue?vue&type=script&lang=js&":
/*!*******************************************************************!*\
  !*** ./resources/js/Pages/Portfolio.vue?vue&type=script&lang=js& ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Portfolio_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Portfolio.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/Portfolio.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Portfolio_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Pages/Portfolio.vue?vue&type=template&id=0a1941ef&":
/*!*************************************************************************!*\
  !*** ./resources/js/Pages/Portfolio.vue?vue&type=template&id=0a1941ef& ***!
  \*************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Portfolio_vue_vue_type_template_id_0a1941ef___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Portfolio.vue?vue&type=template&id=0a1941ef& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/Portfolio.vue?vue&type=template&id=0a1941ef&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Portfolio_vue_vue_type_template_id_0a1941ef___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Portfolio_vue_vue_type_template_id_0a1941ef___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
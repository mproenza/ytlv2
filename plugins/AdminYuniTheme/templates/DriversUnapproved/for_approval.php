<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DriversProfile $driversProfile
 */
?>
<style>

    @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700");
    @import url("https://fonts.googleapis.com/css?family=Roboto:400,300,500,700");

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-weight: 100;
    }
    h1 {
        font-size: 36px;
    }
    h2 {
        font-size: 28px;
    }
    h3 {
        font-size: 18px;
    }
    h4 {
        font-size: 14px;
    }
    h5 {
        font-size: 12px;
    }
    h6 {
        font-size: 10px;
    }
    h3,
    h4,
    h5 {
        margin-top: 5px;
        font-weight: 600;
    }
    .label {
        border-radius: 1em;
    }
    .count-info .label {
        line-height: 12px;
        padding: 2px 5px;
        position: absolute;
        right: 6px;
        top: 12px;
    }
    .arrow {
        float: right;
    }
    .fa.arrow:before {
        content: "\f104";
    }
    .active > a > .fa.arrow:before {
        content: "\f107";
    }

    .btn {
        border-radius: 999px;
    }
    .btn-sm {
        padding: 5px 15px;
    }
    .btn-lg {
        padding: 10px 25px;
    }
    .float-e-margins .btn {
        margin-bottom: 5px;
    }
    .btn-w-m {
        min-width: 120px;
    }
    .btn-primary.btn-outline {
        color: #00a29b;
    }
    .btn-success.btn-outline {
        color: #1c84c6;
    }
    .btn-info.btn-outline {
        color: #23c6c8;
    }
    .btn-warning.btn-outline {
        color: #f8ac59;
    }
    .btn-danger.btn-outline {
        color: #ed5565;
    }
    .btn-primary.btn-outline:hover,
    .btn-success.btn-outline:hover,
    .btn-info.btn-outline:hover,
    .btn-warning.btn-outline:hover,
    .btn-danger.btn-outline:hover {
        color: #fff;
    }
    .btn-primary {
        background-color: #00a29b;
        border-color: #00a29b;
        color: #FFFFFF;
    }
    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active,
    .btn-primary.active,
    .open .dropdown-toggle.btn-primary,
    .btn-primary:active:focus,
    .btn-primary:active:hover,
    .btn-primary.active:hover,
    .btn-primary.active:focus {
        background-color: #00afa7;
        border-color: #00afa7;
        color: #FFFFFF;
    }
    .btn-primary:active,
    .btn-primary.active,
    .open .dropdown-toggle.btn-primary {
        background-image: none;
    }
    .btn-primary.disabled,
    .btn-primary.disabled:hover,
    .btn-primary.disabled:focus,
    .btn-primary.disabled:active,
    .btn-primary.disabled.active,
    .btn-primary[disabled],
    .btn-primary[disabled]:hover,
    .btn-primary[disabled]:focus,
    .btn-primary[disabled]:active,
    .btn-primary.active[disabled],
    fieldset[disabled] .btn-primary,
    fieldset[disabled] .btn-primary:hover,
    fieldset[disabled] .btn-primary:focus,
    fieldset[disabled] .btn-primary:active,
    fieldset[disabled] .btn-primary.active {
        background-color: #1dc5a3;
        border-color: #1dc5a3;
    }
    .btn-success {
        background-color: #1c84c6;
        border-color: #1c84c6;
        color: #FFFFFF;
    }
    .btn-success:hover,
    .btn-success:focus,
    .btn-success:active,
    .btn-success.active,
    .open .dropdown-toggle.btn-success,
    .btn-success:active:focus,
    .btn-success:active:hover,
    .btn-success.active:hover,
    .btn-success.active:focus {
        background-color: #1a7bb9;
        border-color: #1a7bb9;
        color: #FFFFFF;
    }
    .btn-success:active,
    .btn-success.active,
    .open .dropdown-toggle.btn-success {
        background-image: none;
    }
    .btn-success.disabled,
    .btn-success.disabled:hover,
    .btn-success.disabled:focus,
    .btn-success.disabled:active,
    .btn-success.disabled.active,
    .btn-success[disabled],
    .btn-success[disabled]:hover,
    .btn-success[disabled]:focus,
    .btn-success[disabled]:active,
    .btn-success.active[disabled],
    fieldset[disabled] .btn-success,
    fieldset[disabled] .btn-success:hover,
    fieldset[disabled] .btn-success:focus,
    fieldset[disabled] .btn-success:active,
    fieldset[disabled] .btn-success.active {
        background-color: #1f90d8;
        border-color: #1f90d8;
    }
    .btn-info {
        background-color: #23c6c8;
        border-color: #23c6c8;
        color: #FFFFFF;
    }
    .btn-info:hover,
    .btn-info:focus,
    .btn-info:active,
    .btn-info.active,
    .open .dropdown-toggle.btn-info,
    .btn-info:active:focus,
    .btn-info:active:hover,
    .btn-info.active:hover,
    .btn-info.active:focus {
        background-color: #21b9bb;
        border-color: #21b9bb;
        color: #FFFFFF;
    }
    .btn-info:active,
    .btn-info.active,
    .open .dropdown-toggle.btn-info {
        background-image: none;
    }
    .btn-info.disabled,
    .btn-info.disabled:hover,
    .btn-info.disabled:focus,
    .btn-info.disabled:active,
    .btn-info.disabled.active,
    .btn-info[disabled],
    .btn-info[disabled]:hover,
    .btn-info[disabled]:focus,
    .btn-info[disabled]:active,
    .btn-info.active[disabled],
    fieldset[disabled] .btn-info,
    fieldset[disabled] .btn-info:hover,
    fieldset[disabled] .btn-info:focus,
    fieldset[disabled] .btn-info:active,
    fieldset[disabled] .btn-info.active {
        background-color: #26d7d9;
        border-color: #26d7d9;
    }
    .btn-default {
        color: inherit;
        background: white;
        border: 1px solid #e7eaec;
    }
    .btn-default:hover,
    .btn-default:focus,
    .btn-default:active,
    .btn-default.active,
    .open .dropdown-toggle.btn-default,
    .btn-default:active:focus,
    .btn-default:active:hover,
    .btn-default.active:hover,
    .btn-default.active:focus {
        color: inherit;
        border: 1px solid #d2d2d2;
    }
    .btn-default:active,
    .btn-default.active,
    .open .dropdown-toggle.btn-default {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15) inset;
    }
    .btn-default.disabled,
    .btn-default.disabled:hover,
    .btn-default.disabled:focus,
    .btn-default.disabled:active,
    .btn-default.disabled.active,
    .btn-default[disabled],
    .btn-default[disabled]:hover,
    .btn-default[disabled]:focus,
    .btn-default[disabled]:active,
    .btn-default.active[disabled],
    fieldset[disabled] .btn-default,
    fieldset[disabled] .btn-default:hover,
    fieldset[disabled] .btn-default:focus,
    fieldset[disabled] .btn-default:active,
    fieldset[disabled] .btn-default.active {
        color: #cacaca;
    }
    .btn-warning {
        background-color: #f8ac59;
        border-color: #f8ac59;
        color: #FFFFFF;
    }
    .btn-warning:hover,
    .btn-warning:focus,
    .btn-warning:active,
    .btn-warning.active,
    .open .dropdown-toggle.btn-warning,
    .btn-warning:active:focus,
    .btn-warning:active:hover,
    .btn-warning.active:hover,
    .btn-warning.active:focus {
        background-color: #f7a54a;
        border-color: #f7a54a;
        color: #FFFFFF;
    }
    .btn-warning:active,
    .btn-warning.active,
    .open .dropdown-toggle.btn-warning {
        background-image: none;
    }
    .btn-warning.disabled,
    .btn-warning.disabled:hover,
    .btn-warning.disabled:focus,
    .btn-warning.disabled:active,
    .btn-warning.disabled.active,
    .btn-warning[disabled],
    .btn-warning[disabled]:hover,
    .btn-warning[disabled]:focus,
    .btn-warning[disabled]:active,
    .btn-warning.active[disabled],
    fieldset[disabled] .btn-warning,
    fieldset[disabled] .btn-warning:hover,
    fieldset[disabled] .btn-warning:focus,
    fieldset[disabled] .btn-warning:active,
    fieldset[disabled] .btn-warning.active {
        background-color: #f9b66d;
        border-color: #f9b66d;
    }
    .btn-danger {
        background-color: #ed5565;
        border-color: #ed5565;
        color: #FFFFFF;
    }
    .btn-danger:hover,
    .btn-danger:focus,
    .btn-danger:active,
    .btn-danger.active,
    .open .dropdown-toggle.btn-danger,
    .btn-danger:active:focus,
    .btn-danger:active:hover,
    .btn-danger.active:hover,
    .btn-danger.active:focus {
        background-color: #ec4758;
        border-color: #ec4758;
        color: #FFFFFF;
    }
    .btn-danger:active,
    .btn-danger.active,
    .open .dropdown-toggle.btn-danger {
        background-image: none;
    }
    .btn-danger.disabled,
    .btn-danger.disabled:hover,

    .btn-danger.disabled:focus,
    .btn-danger.disabled:active,
    .btn-danger.disabled.active,
    .btn-danger[disabled],
    .btn-danger[disabled]:hover,
    .btn-danger[disabled]:focus,
    .btn-danger[disabled]:active,
    .btn-danger.active[disabled],
    fieldset[disabled] .btn-danger,
    fieldset[disabled] .btn-danger:hover,
    fieldset[disabled] .btn-danger:focus,
    fieldset[disabled] .btn-danger:active,
    fieldset[disabled] .btn-danger.active {
        background-color: #ef6776;
        border-color: #ef6776;
    }
    .btn-link {
        color: inherit;
    }
    .btn-link:hover,
    .btn-link:focus,
    .btn-link:active,
    .btn-link.active,
    .open .dropdown-toggle.btn-link {
        color: #00a29b;
        text-decoration: none;
    }
    .btn-link:active,
    .btn-link.active,
    .open .dropdown-toggle.btn-link {
        background-image: none;
    }
    .btn-link.disabled,
    .btn-link.disabled:hover,
    .btn-link.disabled:focus,
    .btn-link.disabled:active,
    .btn-link.disabled.active,
    .btn-link[disabled],
    .btn-link[disabled]:hover,
    .btn-link[disabled]:focus,
    .btn-link[disabled]:active,
    .btn-link.active[disabled],
    fieldset[disabled] .btn-link,
    fieldset[disabled] .btn-link:hover,
    fieldset[disabled] .btn-link:focus,
    fieldset[disabled] .btn-link:active,
    fieldset[disabled] .btn-link.active {
        color: #cacaca;
    }
    .btn-white {
        color: inherit;
        background: white;
        border: 1px solid #e7eaec;
    }
    .btn-white:hover,
    .btn-white:focus,
    .btn-white:active,
    .btn-white.active,
    .open .dropdown-toggle.btn-white,
    .btn-white:active:focus,
    .btn-white:active:hover,
    .btn-white.active:hover,
    .btn-white.active:focus {
        color: inherit;
        border: 1px solid #d2d2d2;
    }
    .btn-white:active,
    .btn-white.active {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15) inset;
    }
    .btn-white:active,
    .btn-white.active,
    .open .dropdown-toggle.btn-white {
        background-image: none;
    }
    .btn-white.disabled,
    .btn-white.disabled:hover,
    .btn-white.disabled:focus,
    .btn-white.disabled:active,
    .btn-white.disabled.active,
    .btn-white[disabled],
    .btn-white[disabled]:hover,
    .btn-white[disabled]:focus,
    .btn-white[disabled]:active,
    .btn-white.active[disabled],
    fieldset[disabled] .btn-white,
    fieldset[disabled] .btn-white:hover,
    fieldset[disabled] .btn-white:focus,
    fieldset[disabled] .btn-white:active,
    fieldset[disabled] .btn-white.active {
        color: #cacaca;
    }
    .form-control,
    .form-control:focus,
    .has-error .form-control:focus,
    .has-success .form-control:focus,
    .has-warning .form-control:focus,
    .navbar-collapse,
    .navbar-form,
    .navbar-form-custom .form-control:focus,
    .navbar-form-custom .form-control:hover,
    .open .btn.dropdown-toggle,
    .panel,
    .popover,
    .progress,
    .progress-bar {
        box-shadow: none;
    }
    .btn-outline {
        color: inherit;
        background-color: transparent;
        transition: all .5s;
    }
    .btn-rounded {
        border-radius: 50px;
    }
    .btn-large-dim {
        width: 90px;
        height: 90px;
        font-size: 42px;
    }
    button.dim {
        display: inline-block;
        text-decoration: none;
        text-transform: uppercase;
        text-align: center;
        padding-top: 6px;
        margin-right: 10px;
        position: relative;
        cursor: pointer;
        border-radius: 5px;
        font-weight: 600;
        margin-bottom: 20px !important;
    }
    button.dim:active {
        top: 3px;
    }
    button.btn-primary.dim {
        box-shadow: inset 0 0 0 #16987e, 0 5px 0 0 #16987e, 0 10px 5px #999999;
    }
    button.btn-primary.dim:active {
        box-shadow: inset 0 0 0 #16987e, 0 2px 0 0 #16987e, 0 5px 3px #999999;
    }
    button.btn-default.dim {
        box-shadow: inset 0 0 0 #b3b3b3, 0 5px 0 0 #b3b3b3, 0 10px 5px #999999;
    }
    button.btn-default.dim:active {
        box-shadow: inset 0 0 0 #b3b3b3, 0 2px 0 0 #b3b3b3, 0 5px 3px #999999;
    }
    button.btn-warning.dim {
        box-shadow: inset 0 0 0 #f79d3c, 0 5px 0 0 #f79d3c, 0 10px 5px #999999;
    }
    button.btn-warning.dim:active {
        box-shadow: inset 0 0 0 #f79d3c, 0 2px 0 0 #f79d3c, 0 5px 3px #999999;
    }
    button.btn-info.dim {
        box-shadow: inset 0 0 0 #1eacae, 0 5px 0 0 #1eacae, 0 10px 5px #999999;
    }
    button.btn-info.dim:active {
        box-shadow: inset 0 0 0 #1eacae, 0 2px 0 0 #1eacae, 0 5px 3px #999999;
    }
    button.btn-success.dim {
        box-shadow: inset 0 0 0 #1872ab, 0 5px 0 0 #1872ab, 0 10px 5px #999999;
    }
    button.btn-success.dim:active {
        box-shadow: inset 0 0 0 #1872ab, 0 2px 0 0 #1872ab, 0 5px 3px #999999;
    }
    button.btn-danger.dim {
        box-shadow: inset 0 0 0 #ea394c, 0 5px 0 0 #ea394c, 0 10px 5px #999999;
    }
    button.btn-danger.dim:active {
        box-shadow: inset 0 0 0 #ea394c, 0 2px 0 0 #ea394c, 0 5px 3px #999999;
    }
    button.dim:before {
        font-size: 50px;
        line-height: 1em;
        font-weight: normal;
        color: #fff;
        display: block;
        padding-top: 10px;
    }
    button.dim:active:before {
        top: 7px;
        font-size: 50px;
    }
    .btn:focus {
        outline: none !important;
    }
    .label {
        background-color: #d1dade;
        color: #5e5e5e;
        font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 10px;
        font-weight: 600;
        padding: 3px 8px;
        text-shadow: none;
    }
    .badge {
        background-color: #d1dade;
        color: #5e5e5e;
        font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 11px;
        font-weight: 600;
        padding-bottom: 4px;
        padding-left: 6px;
        padding-right: 6px;
        text-shadow: none;
    }
    .label-primary,
    .badge-primary {
        background-color: #00a29b;
        color: #FFFFFF;
    }
    .label-success,
    .badge-success {
        background-color: #1c84c6;
        color: #FFFFFF;
    }
    .label-warning,
    .badge-warning {
        background-color: #f8ac59;
        color: #FFFFFF;
    }
    .label-warning-light,
    .badge-warning-light {
        background-color: #f8ac59;
        color: #ffffff;
    }
    .label-danger,
    .badge-danger {
        background-color: #ed5565;
        color: #FFFFFF;
    }
    .label-info,
    .badge-info {
        background-color: #23c6c8;
        color: #FFFFFF;
    }
    .label-inverse,
    .badge-inverse {
        background-color: #262626;
        color: #FFFFFF;
    }
    .label-white,
    .badge-white {
        background-color: #FFFFFF;
        color: #5E5E5E;
    }
    .label-white,
    .badge-disable {
        background-color: #2A2E36;
        color: #8B91A0;
    }
    /* TOOGLE SWICH */
    .onoffswitch {
        position: relative;
        width: 64px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }
    .onoffswitch-checkbox {
        display: none;
    }
    .onoffswitch-label {
        display: block;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid #00a29b;
        border-radius: 2px;
    }
    .onoffswitch-inner {
        width: 200%;
        margin-left: -100%;
        -moz-transition: margin 0.3s ease-in 0s;
        -webkit-transition: margin 0.3s ease-in 0s;
        -o-transition: margin 0.3s ease-in 0s;
        transition: margin 0.3s ease-in 0s;
    }
    .onoffswitch-inner:before,
    .onoffswitch-inner:after {
        float: left;
        width: 50%;
        height: 20px;
        padding: 0;
        line-height: 20px;
        font-size: 12px;
        color: white;
        font-family: Trebuchet, Arial, sans-serif;
        font-weight: bold;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }
    .onoffswitch-inner:before {
        content: "ON";
        padding-left: 10px;
        background-color: #00a29b;
        color: #FFFFFF;
    }
    .onoffswitch-inner:after {
        content: "OFF";
        padding-right: 10px;
        background-color: #FFFFFF;
        color: #999999;
        text-align: right;
    }
    .onoffswitch-switch {
        width: 20px;
        margin: 0;
        background: #FFFFFF;
        border: 2px solid #00a29b;
        border-radius: 2px;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 44px;
        -moz-transition: all 0.3s ease-in 0s;
        -webkit-transition: all 0.3s ease-in 0s;
        -o-transition: all 0.3s ease-in 0s;
        transition: all 0.3s ease-in 0s;
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
        right: 0;
    }
    .onoffswitch-checkbox:disabled + .onoffswitch-label .onoffswitch-inner:before {
        background-color: #919191;
    }
    .onoffswitch-checkbox:disabled + .onoffswitch-label,
    .onoffswitch-checkbox:disabled + .onoffswitch-label .onoffswitch-switch {
        border-color: #919191;
    }
    /* CHOSEN PLUGIN */
    .chosen-container-single .chosen-single {
        background: #ffffff;
        box-shadow: none;
        -moz-box-sizing: border-box;
        border-radius: 2px;
        cursor: text;
        height: auto !important;
        margin: 0;
        min-height: 30px;
        overflow: hidden;
        padding: 4px 12px;
        position: relative;
        width: 100%;
    }
    .chosen-container-multi .chosen-choices li.search-choice {
        background: #f1f1f1;
        border: 1px solid #e5e6e7;
        border-radius: 2px;
        box-shadow: none;
        color: #333333;
        cursor: default;
        line-height: 13px;
        margin: 3px 0 3px 5px;
        padding: 3px 20px 3px 5px;
        position: relative;
    }
    /* Tags Input Plugin */
    .bootstrap-tagsinput {
        border: 1px solid #e5e6e7;
        box-shadow: none;
    }
    /* PAGINATIN */
    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus {
        background-color: #f4f4f4;
        border-color: #DDDDDD;
        color: inherit;
        cursor: default;
        z-index: 2;
    }
    .pagination > li > a,
    .pagination > li > span {
        background-color: #FFFFFF;
        border: 1px solid #DDDDDD;
        color: inherit;
        float: left;
        line-height: 1.42857;
        margin-left: -1px;
        padding: 4px 10px;
        position: relative;
        text-decoration: none;
    }

    /* LIST GROUP */
    a.list-group-item.active,
    a.list-group-item.active:hover,
    a.list-group-item.active:focus {
        background-color: #00a29b;
        border-color: #00a29b;
        color: #FFFFFF;
        z-index: 2;
    }
    .list-group-item-heading {
        margin-top: 10px;
    }
    .list-group-item-text {
        margin: 0 0 10px;
        color: inherit;
        font-size: 12px;
        line-height: inherit;
    }
    .no-padding .list-group-item {
        border-left: none;
        border-right: none;
        border-bottom: none;
    }
    .no-padding .list-group-item:first-child {
        border-left: none;
        border-right: none;
        border-bottom: none;
        border-top: none;
    }
    .no-padding .list-group {
        margin-bottom: 0;
    }
    .list-group-item {
        background-color: inherit;
        border: 1px solid #e7eaec;
        display: block;
        margin-bottom: -1px;
        padding: 10px 15px;
        position: relative;
    }
    .elements-list .list-group-item {
        border-left: none;
        border-right: none;
        padding: 15px 25px;
    }
    .elements-list .list-group-item:first-child {
        border-left: none;
        border-right: none;
        border-top: none !important;
    }
    .elements-list .list-group {
        margin-bottom: 0;
    }
    .elements-list a {
        color: inherit;
    }
    .elements-list .list-group-item.active,
    .elements-list .list-group-item:hover {
        background: #f3f3f4;
        color: inherit;
        border-color: #e7eaec;
        border-radius: 0;
    }
    .elements-list li.active {
        transition: none;
    }
    .element-detail-box {
        padding: 25px;
    }
    /* FLOT CHART	*/
    .flot-chart {
        display: block;
        height: 200px;
    }
    .widget .flot-chart.dashboard-chart {
        display: block;
        height: 120px;
        margin-top: 40px;
    }
    .flot-chart.dashboard-chart {
        display: block;
        height: 180px;
        margin-top: 40px;
    }
    .flot-chart-content {
        width: 100%;
        height: 100%;
    }
    .flot-chart-pie-content {
        width: 200px;
        height: 200px;
        margin: auto;
    }
    .jqstooltip {
        position: absolute;
        display: block;
        left: 0;
        top: 0;
        visibility: hidden;
        background: #2b303a;
        background-color: rgba(43, 48, 58, 0.8);
        color: white;
        text-align: left;
        white-space: nowrap;
        z-index: 10000;
        padding: 5px 5px 5px 5px;
        min-height: 22px;
        border-radius: 3px;
    }
    .jqsfield {
        color: white;
        text-align: left;
    }
    .fh-150 {
        height: 150px;
    }
    .fh-200 {
        height: 200px;
    }
    .h-150 {
        min-height: 150px;
    }
    .h-200 {
        min-height: 200px;
    }
    .h-300 {
        min-height: 300px;
    }
    .w-150 {
        min-width: 150px;
    }
    .w-200 {
        min-width: 200px;
    }
    .w-300 {
        min-width: 300px;
    }
    .legendLabel {
        padding-left: 5px;
    }
    .stat-list li:first-child {
        margin-top: 0;
    }
    .stat-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .stat-percent {
        float: right;
    }
    .stat-list li {
        margin-top: 15px;
        position: relative;
    }

    /* CIRCLE */
    .img-circle {
        border-radius: 50%;
    }
    .btn-circle {
        width: 30px;
        height: 30px;
        padding: 6px 0;
        border-radius: 15px;
        text-align: center;
        font-size: 12px;
        line-height: 1.428571429;
    }
    .btn-circle.btn-lg {
        width: 50px;
        height: 50px;
        padding: 10px 16px;
        border-radius: 25px;
        font-size: 18px;
        line-height: 1.33;
    }
    .btn-circle.btn-xl {
        width: 70px;
        height: 70px;
        padding: 10px 16px;
        border-radius: 35px;
        font-size: 24px;
        line-height: 1.33;
    }
    .show-grid [class^="col-"] {
        padding-top: 10px;
        padding-bottom: 10px;
        border: 1px solid #ddd;
        background-color: #eee !important;
    }
    .show-grid {
        margin: 15px 0;
    }

    /* WIDGETS */
    .widget {
        border-radius: 5px;
        padding: 15px 20px;
        margin-bottom: 10px;
        margin-top: 10px;
    }
    .widget.style1 h2 {
        font-size: 30px;
    }
    .widget h2,
    .widget h3 {
        margin-top: 5px;
        margin-bottom: 0;
    }
    .widget-text-box {
        padding: 20px;
        border: 1px solid #e7eaec;
        background: #ffffff;
    }
    .widget-head-color-box {
        border-radius: 5px 5px 0 0;
        margin-top: 10px;
    }
    .widget .flot-chart {
        height: 100px;
    }
    .vertical-align div {
        display: inline-block;
        vertical-align: middle;
    }
    .vertical-align h2,
    .vertical-align h3 {
        margin: 0;
    }
    .todo-list {
        list-style: none outside none;
        margin: 0;
        padding: 0;
        font-size: 14px;
    }
    .todo-list.small-list {
        font-size: 12px;
    }
    .todo-list.small-list > li {
        background: #f3f3f4;
        border-left: none;
        border-right: none;
        border-radius: 4px;
        color: inherit;
        margin-bottom: 2px;
        padding: 6px 6px 6px 12px;
    }
    .todo-list.small-list .btn-xs,
    .todo-list.small-list .btn-group-xs > .btn {
        border-radius: 5px;
        font-size: 10px;
        line-height: 1.5;
        padding: 1px 2px 1px 5px;
    }
    .todo-list > li {
        background: #f3f3f4;
        border-left: 6px solid #e7eaec;
        border-right: 6px solid #e7eaec;
        border-radius: 4px;
        color: inherit;
        margin-bottom: 2px;
        padding: 10px;
    }
    .todo-list .handle {
        cursor: move;
        display: inline-block;
        font-size: 16px;
        margin: 0 5px;
    }
    .todo-list > li .label {
        font-size: 9px;
        margin-left: 10px;
    }
    .check-link {
        font-size: 16px;
    }
    .todo-completed {
        text-decoration: line-through;
    }
    .geo-statistic h1 {
        font-size: 36px;
        margin-bottom: 0;
    }
    .glyphicon.fa {
        font-family: "FontAwesome";
    }
    /* INPUTS */
    .inline {
        display: inline-block !important;
    }
    .input-s-sm {
        width: 120px;
    }
    .input-s {
        width: 200px;
    }
    .input-s-lg {
        width: 250px;
    }
    .i-checks {
        padding-left: 0;
    }
    .form-control,
    .single-line {
        background-color: #FFFFFF;
        background-image: none;
        border: 1px solid #e5e6e7;
        border-radius: 1px;
        color: inherit;
        display: block;
        padding: 6px 12px;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        width: 100%;
        font-size: 14px;
    }
    .form-control:focus,
    .single-line:focus {
        border-color: #00a29b;
    }
    .has-success .form-control,
    .has-success .form-control:focus {
        border-color: #00a29b;

    }
    .has-warning .form-control,
    .has-warning .form-control:focus {
        border-color: #f8ac59;
    }
    .has-error .form-control,
    .has-error .form-control:focus {
        border-color: #ed5565;
    }
    .has-success .control-label {
        color: #00a29b;
    }
    .has-warning .control-label {
        color: #f8ac59;
    }
    .has-error .control-label {
        color: #ed5565;
    }
    .input-group-addon {
        background-color: #fff;
        border: 1px solid #E5E6E7;
        border-radius: 1px;
        color: inherit;
        font-size: 14px;
        font-weight: 400;
        line-height: 1;
        padding: 6px 12px;
        text-align: center;
    }

    /* Validation */
    label.error {
        color: #cc5965;
        display: inline-block;
        margin-left: 5px;
    }
    .form-control.error {
        border: 1px dotted #cc5965;
    }
    /* ngGrid */
    .gridStyle {
        border: 1px solid #d4d4d4;
        width: 100%;
        height: 400px;
    }
    .gridStyle2 {
        border: 1px solid #d4d4d4;
        width: 500px;
        height: 300px;
    }
    .ngH eaderCell {
        border-right: none;
        border-bottom: 1px solid #e7eaec;
    }
    .ngCell {
        border-right: none;
    }
    .ngTopPanel {
        background: #F5F5F6;
    }
    .ngRow.even {
        background: #f9f9f9;
    }
    .ngRow.selected {
        background: #EBF2F1;
    }
    .ngRow {
        border-bottom: 1px solid #e7eaec;
    }
    .ngCell {
        background-color: transparent;
    }
    .ngHeaderCell {
        border-right: none;
    }

    /* Tabs */
    .tabs-container .panel-body {
        background: #fff;
        border: 1px solid #e7eaec;
        border-radius: 2px;
        padding: 20px;
        position: relative;
    }
    .tabs-container .nav-tabs > li.active > a,
    .tabs-container .nav-tabs > li.active > a:hover,
    .tabs-container .nav-tabs > li.active > a:focus {
        border: 1px solid #e7eaec;
        border-bottom-color: transparent;
        background-color: #fff;
    }
    .tabs-container .nav-tabs > li {
        float: left;
        margin-bottom: -1px;
    }
    .tabs-container .tab-pane .panel-body {
        border-top: none;
    }
    .tabs-container .nav-tabs > li.active > a,
    .tabs-container .nav-tabs > li.active > a:hover,
    .tabs-container .nav-tabs > li.active > a:focus {
        border: 1px solid #e7eaec;
        border-bottom-color: transparent;
    }
    .tabs-container .nav-tabs {
        border-bottom: 1px solid #e7eaec;
    }
    .tabs-container .tab-pane .panel-body {
        border-top: none;
    }
    .tabs-container .tabs-left .tab-pane .panel-body,
    .tabs-container .tabs-right .tab-pane .panel-body {
        border-top: 1px solid #e7eaec;
    }
    .tabs-container .nav-tabs > li a:hover {
        background: transparent;
        border-color: transparent;
    }
    .tabs-container .tabs-below > .nav-tabs,
    .tabs-container .tabs-right > .nav-tabs,
    .tabs-container .tabs-left > .nav-tabs {
        border-bottom: 0;
    }
    .tabs-container .tabs-left .panel-body {
        position: static;
    }
    .tabs-container .tabs-left > .nav-tabs,
    .tabs-container .tabs-right > .nav-tabs {
        width: 20%;
    }
    .tabs-container .tabs-left .panel-body {
        width: 80%;
        margin-left: 20%;
    }
    .tabs-container .tabs-right .panel-body {
        width: 80%;
        margin-right: 20%;
    }
    .tabs-container .tab-content > .tab-pane,
    .tabs-container .pill-content > .pill-pane {
        display: none;
    }
    .tabs-container .tab-content > .active,
    .tabs-container .pill-content > .active {
        display: block;
    }
    .tabs-container .tabs-below > .nav-tabs {
        border-top: 1px solid #e7eaec;
    }
    .tabs-container .tabs-below > .nav-tabs > li {
        margin-top: -1px;
        margin-bottom: 0;
    }
    .tabs-container .tabs-below > .nav-tabs > li > a {
        -webkit-border-radius: 0 0 4px 4px;
        -moz-border-radius: 0 0 4px 4px;
        border-radius: 0 0 4px 4px;
    }
    .tabs-container .tabs-below > .nav-tabs > li > a:hover,
    .tabs-container .tabs-below > .nav-tabs > li > a:focus {
        border-top-color: #e7eaec;
        border-bottom-color: transparent;
    }
    .tabs-container .tabs-left > .nav-tabs > li,
    .tabs-container .tabs-right > .nav-tabs > li {
        float: none;
    }
    .tabs-container .tabs-left > .nav-tabs > li > a,
    .tabs-container .tabs-right > .nav-tabs > li > a {
        min-width: 74px;
        margin-right: 0;
        margin-bottom: 3px;
    }
    .tabs-container .tabs-left > .nav-tabs {
        float: left;
        margin-right: 19px;
    }
    .tabs-container .tabs-left > .nav-tabs > li > a {
        margin-right: -1px;
        -webkit-border-radius: 4px 0 0 4px;
        -moz-border-radius: 4px 0 0 4px;
        border-radius: 4px 0 0 4px;
    }
    .tabs-container .tabs-left > .nav-tabs .active > a,
    .tabs-container .tabs-left > .nav-tabs .active > a:hover,
    .tabs-container .tabs-left > .nav-tabs .active > a:focus {
        border-color: #e7eaec transparent #e7eaec #e7eaec;
    }
    .tabs-container .tabs-right > .nav-tabs {
        float: right;
        margin-left: 19px;
    }
    .tabs-container .tabs-right > .nav-tabs > li > a {
        margin-left: -1px;
        -webkit-border-radius: 0 4px 4px 0;
        -moz-border-radius: 0 4px 4px 0;
        border-radius: 0 4px 4px 0;
    }
    .tabs-container .tabs-right > .nav-tabs .active > a,
    .tabs-container .tabs-right > .nav-tabs .active > a:hover,
    .tabs-container .tabs-right > .nav-tabs .active > a:focus {
        border-color: #e7eaec #e7eaec #e7eaec transparent;
        z-index: 1;
    }
    @media (max-width: 767px) {
        .tabs-container .nav-tabs > li {
            float: none !important;
        }
        .tabs-container .nav-tabs > li.active > a {
            border-bottom: 1px solid #e7eaec !important;
            margin: 0;
        }
    }

    /* Resizable */
    .resizable-panels .ibox {
        clear: none;
        margin: 10px;
        float: left;
        overflow: hidden;
        min-height: 150px;
        min-width: 150px;
    }
    .resizable-panels .ibox .ibox-content {
        height: calc(100% - 49px);
    }
    .ui-resizable-helper {
        background: rgba(211, 211, 211, 0.4);
    }

    body {
        font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        background-color: #003052;
        font-size: 13px;
        color: #676a6c;
        overflow-x: hidden;
    }
    html,
    body {
        height: 100%;
    }
    body.full-height-layout #wrapper,
    body.full-height-layout #page-wrapper {
        height: 100%;
    }
    #page-wrapper {
        min-height: auto;
    }
    body.boxed-layout {
        background: url('patterns/shattered.png');
    }
    body.boxed-layout #wrapper {
        background-color: #2f4050;
        max-width: 1200px;
        margin: 0 auto;
        -webkit-box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.75);
        box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.75);
    }

    .block {
        display: block;
    }
    .clear {
        display: block;
        overflow: hidden;
    }
    a {
        cursor: pointer;
    }
    a:hover,
    a:focus {
        text-decoration: none;
    }
    .border-bottom {
        border-bottom: 1px solid #e7eaec !important;
    }
    .font-bold {
        font-weight: 600;
    }
    .font-normal {
        font-weight: 400;
    }
    .text-uppercase {
        text-transform: uppercase;
    }
    .font-italic {
        font-style: italic;
    }
    .b-r {
        border-right: 1px solid #e7eaec;
    }
    .hr-line-dashed {
        border-top: 1px dashed #e7eaec;
        color: #ffffff;
        background-color: #ffffff;
        height: 1px;
        margin: 20px 0;
    }
    .hr-line-solid {
        border-bottom: 1px solid #e7eaec;
        background-color: rgba(0, 0, 0, 0);
        border-style: solid !important;
        margin-top: 15px;
        margin-bottom: 15px;
    }
    video {
        width: 100% !important;
        height: auto !important;
    }

    /* WRAPPERS */
    #wrapper {
        width: 100%;
        overflow-x: hidden;
    }
    .wrapper {
        padding: 0 20px;
    }
    .wrapper-content {
        padding: 20px 10px 40px;
    }
    #page-wrapper {
        padding: 0 15px;
        min-height: 568px;
        position: relative !important;
    }
    @media (min-width: 768px) {
        #page-wrapper {
            position: inherit;
            margin: 0 0 0 240px;
            min-height: 2002px;
        }
    }
    .title-action {
        text-align: right;
        padding-top: 30px;
    }
    .ibox-content h1,
    .ibox-content h2,
    .ibox-content h3,
    .ibox-content h4,
    .ibox-content h5,
    .ibox-title h1,
    .ibox-title h2,
    .ibox-title h3,
    .ibox-title h4,
    .ibox-title h5 {
        margin-top: 5px;
    }
    ul.unstyled,
    ol.unstyled {
        list-style: none outside none;
        margin-left: 0;
    }
    .big-icon {
        font-size: 160px !important;
        color: #e5e6e7;
    }

    /* PANELS */
    .page-heading {
        border-top: 0;
        padding: 0 10px 20px 10px;
    }
    .panel-heading h1,
    .panel-heading h2 {
        margin-bottom: 5px;
    }

    /* PANELS */
    .panel.blank-panel {
        background: none;
        margin: 0;
    }
    .blank-panel .panel-heading {
        padding-bottom: 0;
    }
    .nav-tabs > li > a {
        color: #A7B1C2;
        font-weight: 600;
        padding: 10px 20px 10px 25px;
    }
    .nav-tabs > li > a:hover,
    .nav-tabs > li > a:focus {
        background-color: #e6e6e6;
        color: #676a6c;
    }
    .ui-tab .tab-content {
        padding: 20px 0;
    }
    /* GLOBAL	*/
    .no-padding {
        padding: 0 !important;
    }
    .no-borders {
        border: none !important;
    }
    .no-margins {
        margin: 0 !important;
    }
    .no-top-border {
        border-top: 0 !important;
    }
    .ibox-content.text-box {
        padding-bottom: 0;
        padding-top: 15px;
    }
    .border-left-right {
        border-left: 1px solid #e7eaec;
        border-right: 1px solid #e7eaec;
    }
    .border-top-bottom {
        border-top: 1px solid #e7eaec;
        border-bottom: 1px solid #e7eaec;
    }
    .border-left {
        border-left: 1px solid #e7eaec;
    }
    .border-right {
        border-right: 1px solid #e7eaec;
    }
    .border-top {
        border-top: 1px solid #e7eaec;
    }
    .border-bottom {
        border-bottom: 1px solid #e7eaec;
    }
    .border-size-sm {
        border-width: 3px;
    }
    .border-size-md {
        border-width: 6px;
    }
    .border-size-lg {
        border-width: 9px;
    }
    .border-size-xl {
        border-width: 12px;
    }
    .full-width {
        width: 100% !important;
    }
    .link-block {
        font-size: 12px;
        padding: 10px;
    }
    .nav.navbar-top-links .link-block a {
        font-size: 12px;
    }
    .link-block a {
        font-size: 10px;
        color: inherit;
    }
    body.mini-navbar .branding {
        display: none;
    }
    img.circle-border {
        border: 6px solid #FFFFFF;
        border-radius: 50%;
    }
    .branding {
        float: left;
        color: #FFFFFF;
        font-size: 18px;
        font-weight: 600;
        padding: 17px 20px;
        text-align: center;
        background-color: #00a29b;
    }
    .login-panel {
        margin-top: 25%;
    }
    .icons-box h3 {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .icons-box .infont a i {
        font-size: 25px;
        display: block;
        color: #676a6c;
    }
    .icons-box .infont a {
        color: #a6a8a9;
    }
    .icons-box .infont a {
        padding: 10px;
        margin: 1px;
        display: block;
    }
    .ui-draggable .ibox-title {
        cursor: move;
    }
    .breadcrumb {
        background-color: #ffffff;
        padding: 0;
        margin-bottom: 0;
    }
    .breadcrumb > li a {
        color: inherit;
    }
    .breadcrumb > .active {
        color: inherit;
    }
    code {
        background-color: #F9F2F4;
        border-radius: 4px;
        color: #ca4440;
        font-size: 90%;
        padding: 2px 4px;
        white-space: nowrap;
    }
    .ibox {
        clear: both;
        margin-bottom: 25px;
        margin-top: 0;
        padding: 0;
    }
    .ibox.collapsed .ibox-content {
        display: none;
    }
    .ibox.collapsed .fa.fa-chevron-up:before {
        content: "\f078";
    }
    .ibox.collapsed .fa.fa-chevron-down:before {
        content: "\f077";
    }
    .ibox:after,
    .ibox:before {
        display: table;
    }
    .ibox-title {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        background-color: #ffffff;
        border-color: #e7eaec;
        border-image: none;
        border-style: solid solid none;
        border-width: 2px 0 0;
        color: inherit;
        margin-bottom: 0;
        padding: 15px 15px 7px;
        min-height: 48px;
    }
    .ibox-content {
        background-color: #ffffff;
        color: inherit;
        padding: 15px 20px 20px 20px;
        border-color: #e7eaec;
        border-image: none;
        border-style: solid solid none;
        border-width: 1px 0;
    }
    .ibox-footer {
        color: inherit;
        border-top: 1px solid #e7eaec;
        font-size: 90%;
        background: #ffffff;
        padding: 10px 15px;
    }
    table.table-mail tr td {
        padding: 12px;
    }
    .table-mail .check-mail {
        padding-left: 20px;
    }
    .table-mail .mail-date {
        padding-right: 20px;
    }
    .star-mail,
    .check-mail {
        width: 40px;
    }
    .unread td a,
    .unread td {
        font-weight: 600;
        color: inherit;
    }
    .read td a,
    .read td {
        font-weight: normal;
        color: inherit;
    }
    .unread td {
        background-color: #f9f8f8;
    }
    .ibox-content {
        clear: both;
    }
    .ibox-heading {
        background-color: #f3f6fb;
        border-bottom: none;
    }
    .ibox-heading h3 {
        font-weight: 200;
        font-size: 24px;
    }
    .ibox-title h5 {
        display: inline-block;
        font-size: 14px;
        margin: 0 0 7px;
        padding: 0;
        text-overflow: ellipsis;
        float: left;
    }
    .ibox-title .label {
        float: left;
        margin-left: 4px;
    }
    .ibox-tools {
        display: block;
        float: none;
        margin-top: 0;
        position: relative;
        padding: 0;
        text-align: right;
    }
    .ibox-tools a {
        cursor: pointer;
        margin-left: 5px;
        color: #c4c4c4;
    }
    .ibox-tools a.btn-primary {
        color: #fff;
    }
    .ibox-tools .dropdown-menu > li > a {
        padding: 4px 10px;
        font-size: 12px;
    }
    .ibox .ibox-tools.open > .dropdown-menu {
        left: auto;
        right: 0;
    }
    /* BACKGROUNDS */
    .gray-bg,
    .bg-muted {
        background-color: #f3f3f4;
    }
    .white-bg {
        background-color: #ffffff;
    }
    .blue-bg,
    .bg-success {
        background-color: #1c84c6;
        color: #ffffff;
    }
    .navy-bg,
    .bg-primary {
        background-color: #00a29b;
        color: #ffffff;
    }
    .lazur-bg,
    .bg-info {
        background-color: #14c9c1;
        color: #ffffff;
    }
    .yellow-bg,
    .bg-warning {
        background-color: #f8ac59;
        color: #ffffff;
    }
    .red-bg,
    .bg-danger {
        background-color: #ed5565;
        color: #ffffff;
    }
    .black-bg {
        background-color: #262626;
    }
    .panel-primary {
        border-color: #00a29b;
    }
    .panel-primary > .panel-heading {
        background-color: #00a29b;
        border-color: #00a29b;
    }
    .panel-success {
        border-color: #1c84c6;
    }
    .panel-success > .panel-heading {
        background-color: #1c84c6;
        border-color: #1c84c6;
        color: #ffffff;
    }
    .panel-info {
        border-color: #23c6c8;
    }
    .panel-info > .panel-heading {
        background-color: #23c6c8;
        border-color: #23c6c8;
        color: #ffffff;
    }
    .panel-warning {
        border-color: #f8ac59;
    }
    .panel-warning > .panel-heading {
        background-color: #f8ac59;
        border-color: #f8ac59;
        color: #ffffff;
    }
    .panel-danger {
        border-color: #ed5565;
    }
    .panel-danger > .panel-heading {
        background-color: #ed5565;
        border-color: #ed5565;
        color: #ffffff;
    }
    .progress-bar {
        background-color: #00a29b;
    }
    .progress-small,
    .progress-small .progress-bar {
        height: 10px;
    }
    .progress-small,
    .progress-mini {
        margin-top: 5px;
    }
    .progress-mini,
    .progress-mini .progress-bar {
        height: 5px;
        margin-bottom: 0;
    }
    .progress-bar-navy-light {
        background-color: #3dc7ab;
    }
    .progress-bar-success {
        background-color: #1c84c6;
    }
    .progress-bar-info {
        background-color: #23c6c8;
    }
    .progress-bar-warning {
        background-color: #f8ac59;
    }
    .progress-bar-danger {
        background-color: #ed5565;
    }
    .panel-title {
        font-size: inherit;
    }
    .jumbotron {
        border-radius: 6px;
        padding: 40px;
    }
    .jumbotron h1 {
        margin-top: 0;
    }
    /* COLORS */
    .text-navy {
        color: #00a29b;
    }
    .text-primary {
        color: inherit;
    }
    .text-success {
        color: #1c84c6;
    }
    .text-info {
        color: #23c6c8;
    }
    .text-warning {
        color: #f8ac59;
    }
    .text-danger {
        color: #ed5565;
    }
    .text-muted {
        color: #888888;
    }
    .text-white {
        color: #ffffff;
    }
    .simple_tag {
        background-color: #f3f3f4;
        border: 1px solid #e7eaec;
        border-radius: 2px;
        color: inherit;
        font-size: 10px;
        margin-right: 5px;
        margin-top: 5px;
        padding: 5px 12px;
        display: inline-block;
    }
    .img-shadow {
        -webkit-box-shadow: 0 0 3px 0 #919191;
        -moz-box-shadow: 0 0 3px 0 #919191;
        box-shadow: 0 0 3px 0 #919191;
    }

    .fullscreen-ibox-mode .animated {
        animation: none;
    }
    body.fullscreen-ibox-mode {
        overflow-y: hidden;
    }
    .ibox.fullscreen {
        z-index: 2030;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        overflow: auto;
        margin-bottom: 0;
    }
    .ibox.fullscreen .collapse-link {
        display: none;
    }
    .ibox.fullscreen .ibox-content {
        min-height: calc(100% - 48px);
    }

    /* FILE MANAGER */
    .file-box {
        float: left;
        width: 220px;
    }
    .file-manager h5 {
        text-transform: uppercase;
    }
    .file-manager {
        list-style: none outside none;
        margin: 0;
        padding: 0;
    }
    .folder-list li a {
        color: #666666;
        display: block;
        padding: 5px 0;
    }
    .folder-list li {
        border-bottom: 1px solid #e7eaec;
        display: block;
    }
    .folder-list li i {
        margin-right: 8px;
        color: #3d4d5d;
    }
    .category-list li a {
        color: #666666;
        display: block;
        padding: 5px 0;
    }
    .category-list li {
        display: block;
    }
    .category-list li i {
        margin-right: 8px;
        color: #3d4d5d;
    }
    .category-list li a .text-navy {
        color: #00a29b;
    }
    .category-list li a .text-primary {
        color: #1c84c6;
    }
    .category-list li a .text-info {
        color: #23c6c8;
    }
    .category-list li a .text-danger {
        color: #EF5352;
    }
    .category-list li a .text-warning {
        color: #F8AC59;
    }
    .file-manager h5.tag-title {
        margin-top: 20px;
    }
    .tag-list li {
        float: left;
    }
    .tag-list li a {
        font-size: 10px;
        background-color: #f3f3f4;
        padding: 5px 12px;
        color: inherit;
        border-radius: 2px;
        border: 1px solid #e7eaec;
        margin-right: 5px;
        margin-top: 5px;
        display: block;
    }
    .file {
        border: 1px solid #e7eaec;
        padding: 0;
        background-color: #ffffff;
        position: relative;
        margin-bottom: 20px;
        margin-right: 20px;
    }
    .file-manager .hr-line-dashed {
        margin: 15px 0;
    }
    .file .icon,
    .file .image {
        height: 100px;
        overflow: hidden;
    }
    .file .icon {
        padding: 15px 10px;
        text-align: center;
    }
    .file-control {
        color: inherit;
        font-size: 11px;
        margin-right: 10px;
    }
    .file-control.active {
        text-decoration: underline;
    }
    .file .icon i {
        font-size: 70px;
        color: #dadada;
    }
    .file .file-name {
        padding: 10px;
        background-color: #f8f8f8;
        border-top: 1px solid #e7eaec;
    }
    .file-name small {
        color: #676a6c;
    }
    .corner {
        position: absolute;
        display: inline-block;
        width: 0;
        height: 0;
        line-height: 0;
        border: 0.6em solid transparent;
        border-right: 0.6em solid #f1f1f1;
        border-bottom: 0.6em solid #f1f1f1;
        right: 0em;
        bottom: 0em;
    }
    a.compose-mail {
        padding: 8px 10px;
    }
    .mail-search {
        max-width: 300px;
    }

</style>
    <div class="container">
        <div class="row">
            <?= $this->Form->create($driversUnapproved,['type'=>'file','id'=>'mainform','url' => ['action' => 'for-approval/'.$driversUnapproved->id]]) ?>
            <div class="col-lg-11">
                <div class="ibox collapsed ">
                    <div class="ibox-title">
                        <h5><?= __('DATOS DEL CHOFER') ?><small> (del registro)</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="driversProfiles form content">

                            <div class="row">
                                <div class="col-sm-7 b-r">


                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo $this->Form->control('username', array('type'=>'text', 'label' => 'Correo','class'=>'form-control','required'=>true)); ?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->control('phone', array('label'=>'Teléfono', 'placeholder'=>'Teléfono móvil (+53...)', 'required'=>true,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo $this->Form->control('full_name', array('type'=>'text', 'label' => 'Nombre completo','class'=>'form-control','required'=>true)); ?>
                                            <?php echo $this->Form->control('name', array('type'=>'hidden', 'value'=>$driversUnapproved->full_name)); ?>
                                            <?php echo $this->Form->control('DriversProfiles.driver_name', array('type'=>'hidden', 'value'=>$driversUnapproved->full_name)); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->control('province_id', array('type' => 'select', 'options' => $provinces, 'label' => 'Provincia donde vive')); ?>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo $this->Form->control('about', array('required'=>true,'label' => 'Descripción (Resumen Bio para los clientes)','class'=>'form-control','type'=>'textarea')); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <table>
                                                <tr><td colspan="2"><?php echo $this->Form->control('car_model', array('required'=>true,'type'=>'text', 'label' => 'Marca y modelo auto','class'=>'form-control')); ?></td></tr>
                                                <tr>
                                                    <td style="margin-right:2px"> <?php echo $this->Form->control('max_people_count', array('required'=>true,'default' => 4, 'min' => 1, 'label' => 'Cap. máxima','class'=>'form-control')); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="conainer" style="border: solid 2px #F9F2F4; margin-top: 3px; padding: 5px; border-radius: 5px">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php echo $this->Form->checkbox('has_air_conditioner', ['hiddenField'=>'false']).'<b> Aire acondicionado?</b>'; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo $this->Form->checkbox('speaks_english',['hiddenField'=>'false']).'<b> Habla inglés?</b>'; ?>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <div class="col-sm-5"><h4>Ver imágenes</h4>
                                    <div class="col-xs-9 col-md-9">
                                        <div class="form-group">
                                            <label>Foto con auto</label>
                                            <div class="input-group">
                                                <img class="img-responsive" style="max-width: 8em; max-height: 6em" src="<?= App\Util\PathUtil::getFullPath($driversUnapproved->image1_path)?>">
                                                <?php echo $this->Form->control('image1_patho', array('type'=>'hidden', 'value'=>$driversUnapproved->image1_path)); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-9 col-md-9">
                                        <div class="form-group">
                                            <label>Foto del auto</label>
                                            <div class="input-group">
                                                <img class="img-responsive" style="max-width: 8em; max-height: 6em" src="<?= App\Util\PathUtil::getFullPath($driversUnapproved->image2_path)?>">
                                                <?php echo $this->Form->control('image2_patho', array('type'=>'hidden', 'value'=>$driversUnapproved->image2_path)); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-9 col-md-9">
                                        <div class="form-group">
                                            <label>foto principal del perfil</label>
                                            <div class="input-group">
                                                <img class="img-responsive" style="max-width: 8em; max-height: 6em" src="<?= App\Util\PathUtil::getFullPath($driversUnapproved->image3_path)?>">
                                                <?php echo $this->Form->control('image3_patho', array('type'=>'hidden', 'value'=>$driversUnapproved->image3_path)); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?= __('DATOS PARA PERFIL') ?></h5>

                    </div>
                    <div class="ibox-content">
                        <div class="driversProfiles form content">

                            <div class="row">
                                <div class="col-sm-7 b-r">
                                     <input type="hidden" name="driver_id" id="driver_id" value="<?php echo $driversUnapproved->id ?>">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo $this->Form->control('code', array('type'=>'text', 'label' => 'Codigo del chofer','class'=>'form-control','required'=>true)); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->control('slug', array('label'=>'URL perfil (slug)', 'placeholder'=>'Para: /drivers/profile/<slug>', 'required'=>true,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo $this->Form->control('Localities.0.id', array('type' => 'select', 'multiple'=>'multiple', 'options' => $localities,
                                            'label' => 'Localidades origen de sus viajes')); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <table>
                                                <tr><td colspan="2"><?php echo $this->Form->control('car_type', array('required'=>true,'type'=>'select', 'label' => 'Tipo de auto','class'=>'form-control','options'=>["Moderno","Clásico","Otro"])); ?></td></tr>
                                                <tr>
                                                    <td style="margin-right:2px"> <?php echo $this->Form->control('min_people_count', array('required'=>true,'default' => 1, 'max' => 2, 'label' => 'Cap. mínima','class'=>'form-control')); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="conainer" style="border: solid 2px #F9F2F4; margin-top: 3px; padding: 5px; border-radius: 5px">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php echo $this->Form->checkbox('active', ['hiddenField'=>'false']).'<b> Activo?</b>'; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo $this->Form->checkbox('receive_requests',['hiddenField'=>'false']).'<b> Recibe notificaciones?</b>'; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo $this->Form->checkbox('email_active',['hiddenField'=>'false']).'<b> Recibe en email?</b>'; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo $this->Form->checkbox('mobile_app_active',['hiddenField'=>'false']).'<b> Tiene la App?</b>'; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo $this->Form->checkbox('has_modern_car',['hiddenField'=>'false']).'<b> Auto moderno?</b>'; ?>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <br>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->control('password',['id'=>'passfield', 'label'=>'Contraseña para el usuario','type'=>'password','class'=>'form-control','required'=>true]); ?>
                                            <span class="btn btn-default" id="show" title="Mostrar">
                                                <i class="fa fa-eye"></i>
                                            </span>
                                            <span class="btn btn-default" id="generate" title="Generar contraseña" onclick="genPwd()">
                                                <i class="fa fa-gear"></i>
                                            </span>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-sm-5"><h4>Describir imágenes</h4>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Imagen de usuario <small>(Se debe ver el rostro JPG)</small></label>
                                            <img class="img-responsive" style="max-width: 8em; max-height: 6em" src="<?= App\Util\PathUtil::getFullPath($driversUnapproved->image1_path)?>">
                                            <div class="input-group">
                                                <div class="fileinput fileinput-new " data-provides="fileinput">
                                                    <span class="btn btn-default btn-file"><span class="fileinput-new"><i class="fa fa-paperclip"></i></span><span class="fileinput-exists"><i class="fa fa-copy"></i> </span><input type="file" name="image1"></span>
                                                    <span class="fileinput-filename"></span>
                                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-6">
                                                <?php echo $this->Form->control('img1_title_es', array('type'=>'text', 'label' => 'Título Es','class'=>'form-control','required'=>true)); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo $this->Form->control('img1_title_en', array('label'=>'Título En', 'required'=>true,'class'=>'form-control')); ?>
                                            </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>foto con su auto <small>(JPG hasta 500Kb)</small></label>
                                            <img class="img-responsive" style="max-width: 8em; max-height: 6em" src="<?= App\Util\PathUtil::getFullPath($driversUnapproved->image2_path)?>">
                                            <div class="input-group">
                                                <div class="fileinput fileinput-new " data-provides="fileinput">
                                                    <span class="btn btn-default btn-file"><span class="fileinput-new"><i class="fa fa-paperclip"></i></span><span class="fileinput-exists"><i class="fa fa-copy"></i> </span><input type="file" name="image2"></span>
                                                    <span class="fileinput-filename"></span>
                                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->control('img2_title_es', array('type'=>'text', 'label' => 'Título Es','class'=>'form-control','required'=>true)); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->control('img2_title_en', array('label'=>'Título En', 'required'=>true,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>foto principal del perfil <small>(JPG hasta 500Kb)</small></label>
                                            <img class="img-responsive" style="max-width: 8em; max-height: 6em" src="<?= App\Util\PathUtil::getFullPath($driversUnapproved->image3_path)?>">
                                            <div class="input-group">
                                                <div class="fileinput fileinput-new " data-provides="fileinput">
                                                    <span class="btn btn-default btn-file"><span class="fileinput-new"><i class="fa fa-paperclip"></i></span><span class="fileinput-exists"><i class="fa fa-copy"></i> </span><input type="file" name="image3"></span>
                                                    <span class="fileinput-filename"></span>
                                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->control('img3_title_es', array('type'=>'text', 'label' => 'Título Es','class'=>'form-control','required'=>true)); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->control('img3_title_en', array('label'=>'Título En', 'required'=>true,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="row">
                            <button type="submit" class="btn btn-primary btn-lg">Aprobar Registro del Chofer</button>
                        </div>
                    </div>
                </div>

            </div>


            <?php echo $this->Form->end(); ?>

        </div>
    </div>

<script>
    $("input[type=file]").on('change',function(){
        alert('fichero seleccionado');
        var id=$("#driver_id").val();
        var formData = new FormData($("#mainform")[0])
    $.ajax({
        url: "drivers-unapproved/edit/".id,
        type: "POST",
        data:formData,
        processData:false,
        contentType: false,
        /*data: {
            name: name,
            phone: phone,
            email: email,
            message: message,
            to: to,
            subscriber: subscriber,
            addon: addon
        },*/
        cache: false,
        success: function(msg) {
            // Success message


        },
        error: function(msg) {

        },
    });

    });

    /*Generate password*/
    var uppers = "ABCDEFHGIJKLMNOPQRSTUVWXYZ";
    var lowers = "abcdefghijklmnopqrstuvwxyz";
    var digits = "0123456789";
    var specials = "!@#$%^&*_-=+";
    var minlen = 3;
    var maxlen = 10;
    function genPwd() {
        var dict = '';
        var pwd = '';
        dict += uppers+= lowers+=digits+=specials;


            for (var i = 0; i < maxlen; ++i) {
                pwd += dict[Math.floor(Math.random() * dict.length)];
            }

            $("#passfield").val(pwd);

    }

    $("#show").on('click', function(){
       if( $("#show > i").hasClass('fa fa-eye') ) {
           $("#show > i").removeClass('fa fa-eye');
           $("#show > i").addClass('fa fa-eye-slash')
           $("#passfield").attr('type','text');
       }else{
               $("#show > i").removeClass('fa fa-eye-slash');
               $("#show > i").addClass('fa fa-eye')
               $("#passfield").attr('type','password');

       }
    })
</script>

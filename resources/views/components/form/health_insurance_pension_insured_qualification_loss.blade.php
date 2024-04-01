<div class="egovui-application-form-grid pb2">
    <div class="egovui-application-form-input-area">

        <script type="text/javascript">null</script>
        <div id="eGovFormArea">
            <div id="eGovScript">
            </div>
            <div id="eGovForm">
                <style>
                    @charset "UTF-8";
                    .egovuiForm-flex-row {
                        display: flex;
                        flex-direction: row;
                    }

                    .egovuiForm-align-items-end {
                        align-items: flex-end !important;
                    }

                    .egovuiForm-align-items-center {
                        align-items: center !important;
                    }

                    table.egovuiForm-vertical {
                        border-collapse: collapse;
                    }

                    table.egovuiForm-vertical th,
                    table.egovuiForm-vertical td {
                        padding: 0 0.6rem;
                    }

                    table.egovuiForm-vertical th {
                        height: 4.2rem;
                        background-color: #F5F6F8;
                        font-weight: normal;
                        text-align: left;
                    }

                    table.egovuiForm-vertical td {
                        height: 5.4rem;
                        background-color: #FFFFFF;
                        border-bottom: solid 0.1rem #C6C9D3;
                    }

                    table.egovuiForm-vertical tr:first-child>th {
                        border-top: solid 0.1rem #C6C9D3;
                    }

                    table.egovuiForm-horizontal {
                        border-collapse: collapse;
                    }

                    table.egovuiForm-horizontal th,
                    table.egovuiForm-horizontal td {
                        padding: 1rem;
                    }

                    table.egovuiForm-horizontal th {
                        background-color: #F5F6F8;
                        border-bottom: solid 0.1rem #C6C9D3;
                        text-align: left;
                        font-weight: normal;
                        vertical-align: top;
                    }

                    table.egovuiForm-horizontal td {
                        background-color: #FFFFFF;
                        border-bottom: solid 0.1rem #C6C9D3;
                    }

                    table.egovuiForm-horizontal tr:first-child>td,
                    table.egovuiForm-horizontal tr:first-child>th {
                        border-top: solid 0.1rem #C6C9D3;
                    }

                    table.egovuiForm-normal-vertical {
                        border-collapse: collapse;
                    }

                    table.egovuiForm-normal-vertical tr {
                        border-left: solid 0.1rem #C6C9D3;
                        border-right: solid 0.1rem #C6C9D3;
                    }

                    table.egovuiForm-normal-vertical th,
                    table.egovuiForm-normal-vertical td {
                        padding: 0 0.6rem;
                    }

                    table.egovuiForm-normal-vertical th {
                        height: 4.2rem;
                        background-color: #F5F6F8;
                        font-weight: normal;
                        text-align: left;
                    }

                    table.egovuiForm-normal-vertical td {
                        height: 5.4rem;
                        background-color: #FFFFFF;
                        border-bottom: solid 0.1rem #C6C9D3;
                    }

                    table.egovuiForm-normal-vertical tr:first-child>th {
                        border-top: solid 0.1rem #C6C9D3;
                    }

                    table.egovuiForm-normal-horizontal {
                        border-collapse: collapse;
                    }

                    table.egovuiForm-normal-horizontal tr {
                        border-left: solid 0.1rem #C6C9D3;
                        border-right: solid 0.1rem #C6C9D3;
                    }

                    table.egovuiForm-normal-horizontal th,
                    table.egovuiForm-normal-horizontal td {
                        padding: 1rem;
                    }

                    table.egovuiForm-normal-horizontal th {
                        background-color: #F5F6F8;
                        border-bottom: solid 0.1rem #C6C9D3;
                        text-align: left;
                        font-weight: normal;
                        vertical-align: top;
                    }

                    table.egovuiForm-normal-horizontal td {
                        background-color: #FFFFFF;
                        border-bottom: solid 0.1rem #C6C9D3;
                    }

                    table.egovuiForm-normal-horizontal tr:first-child>td,
                    table.egovuiForm-normal-horizontal tr:first-child>th {
                        border-top: solid 0.1rem #C6C9D3;
                    }

                    table.egovuiForm-normal-horizontal.egovuiForm-blue {
                        border-collapse: collapse;
                    }

                    table.egovuiForm-normal-horizontal.egovuiForm-blue th,
                    table.egovuiForm-normal-horizontal.egovuiForm-blue td {
                        padding: 1rem;
                    }

                    table.egovuiForm-normal-horizontal.egovuiForm-blue th {
                        background-color: #E5EBF5;
                        border-bottom: solid 0.1rem #C6C9D3;
                        text-align: left;
                        font-weight: normal;
                        vertical-align: top;
                    }

                    table.egovuiForm-normal-horizontal.egovuiForm-blue td {
                        background-color: #FFFFFF;
                        border-bottom: solid 0.1rem #C6C9D3;
                    }

                    table.egovuiForm-normal-horizontal.egovuiForm-blue tr:first-child>td,
                    table.egovuiForm-normal-horizontal.egovuiForm-blue tr:first-child>th {
                        border-top: solid 0.1rem #C6C9D3;
                    }

                    @media (min-width: 600px) {
                        .egovuiForm-responsive table.egovuiForm-vertical-pc {
                            border-collapse: collapse;
                        }

                        .egovuiForm-responsive table.egovuiForm-vertical-pc th,
                        .egovuiForm-responsive table.egovuiForm-vertical-pc td {
                            padding: 0 0.6rem;
                        }

                        .egovuiForm-responsive table.egovuiForm-vertical-pc th {
                            height: 4.2rem;
                            background-color: #F5F6F8;
                            font-weight: normal;
                            text-align: left;
                        }

                        .egovuiForm-responsive table.egovuiForm-vertical-pc td {
                            height: 5.4rem;
                            background-color: #FFFFFF;
                            border-bottom: solid 0.1rem #C6C9D3;
                        }

                        .egovuiForm-responsive table.egovuiForm-vertical-pc tr:first-child>th {
                            border-top: solid 0.1rem #C6C9D3;
                        }

                        .egovuiForm-responsive table.egovuiForm-horizontal-pc {
                            border-collapse: collapse;
                        }

                        .egovuiForm-responsive table.egovuiForm-horizontal-pc th,
                        .egovuiForm-responsive table.egovuiForm-horizontal-pc td {
                            padding: 1rem;
                        }

                        .egovuiForm-responsive table.egovuiForm-horizontal-pc th {
                            background-color: #F5F6F8;
                            border-bottom: solid 0.1rem #C6C9D3;
                            text-align: left;
                            font-weight: normal;
                            vertical-align: top;
                        }

                        .egovuiForm-responsive table.egovuiForm-horizontal-pc td {
                            background-color: #FFFFFF;
                            border-bottom: solid 0.1rem #C6C9D3;
                        }

                        .egovuiForm-responsive table.egovuiForm-horizontal-pc tr:first-child>td,
                        .egovuiForm-responsive table.egovuiForm-horizontal-pc tr:first-child>th {
                            border-top: solid 0.1rem #C6C9D3;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-vertical-pc {
                            border-collapse: collapse;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-vertical-pc tr {
                            border-left: solid 0.1rem #C6C9D3;
                            border-right: solid 0.1rem #C6C9D3;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-vertical-pc th,
                        .egovuiForm-responsive table.egovuiForm-normal-vertical-pc td {
                            padding: 0 0.6rem;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-vertical-pc th {
                            height: 4.2rem;
                            background-color: #F5F6F8;
                            font-weight: normal;
                            text-align: left;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-vertical-pc td {
                            height: 5.4rem;
                            background-color: #FFFFFF;
                            border-bottom: solid 0.1rem #C6C9D3;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-vertical-pc tr:first-child>th {
                            border-top: solid 0.1rem #C6C9D3;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc {
                            border-collapse: collapse;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc tr {
                            border-left: solid 0.1rem #C6C9D3;
                            border-right: solid 0.1rem #C6C9D3;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc th,
                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc td {
                            padding: 1rem;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc th {
                            background-color: #F5F6F8;
                            border-bottom: solid 0.1rem #C6C9D3;
                            text-align: left;
                            font-weight: normal;
                            vertical-align: top;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc td {
                            background-color: #FFFFFF;
                            border-bottom: solid 0.1rem #C6C9D3;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc tr:first-child>td,
                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc tr:first-child>th {
                            border-top: solid 0.1rem #C6C9D3;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc.egovuiForm-blue {
                            border-collapse: collapse;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc.egovuiForm-blue th,
                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc.egovuiForm-blue td {
                            padding: 1rem;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc.egovuiForm-blue th {
                            background-color: #E5EBF5;
                            border-bottom: solid 0.1rem #C6C9D3;
                            text-align: left;
                            font-weight: normal;
                            vertical-align: top;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc.egovuiForm-blue td {
                            background-color: #FFFFFF;
                            border-bottom: solid 0.1rem #C6C9D3;
                        }

                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc.egovuiForm-blue tr:first-child>td,
                        .egovuiForm-responsive table.egovuiForm-normal-horizontal-pc.egovuiForm-blue tr:first-child>th {
                            border-top: solid 0.1rem #C6C9D3;
                        }

                        .egovuiForm-responsive table.egovuiForm-list-pc {
                            display: flex;
                            flex-flow: column nowrap;
                        }

                        .egovuiForm-responsive table.egovuiForm-list-pc thead,
                        .egovuiForm-responsive table.egovuiForm-list-pc tbody {
                            display: flex;
                            flex-flow: column nowrap;
                        }

                        .egovuiForm-responsive table.egovuiForm-list-pc tr {
                            display: flex;
                            flex-flow: column nowrap;
                        }

                        .egovuiForm-responsive table.egovuiForm-list-pc tr th {
                            display: block;
                            background: #E1E1E1;
                            padding: 1rem;
                            text-align: left;
                        }

                        .egovuiForm-responsive table.egovuiForm-list-pc tr td {
                            display: block;
                            padding: 1rem;
                        }

                        .egovuiForm-responsive .egovuiForm-search-info-sp {
                            display: none;
                        }

                        .egovuiForm-responsive .egovuiForm-important-wrapper {
                            flex: 0 0 3.6rem;
                            height: 3.6rem;
                        }

                        .egovuiForm-responsive .egovuiForm-important {
                            display: -ms-grid;
                            display: grid;
                            width: 116.8rem;
                            height: 100%;
                            -ms-grid-columns: 15rem 1fr 3.6rem;
                            grid-template-columns: 15rem 1fr 3.6rem;
                            -ms-grid-rows: 1fr;
                            grid-template-rows: 1fr;
                            grid-template-areas: "t n l";
                        }

                        .egovuiForm-responsive .egovuiForm-important .egovuiForm-important-title {
                            grid-area: t;
                            -ms-grid-row-align: center;
                            align-self: center;
                        }

                        .egovuiForm-responsive .egovuiForm-important .egovuiForm-important-notice {
                            grid-area: n;
                            -ms-grid-row-align: center;
                            align-self: center;
                        }

                        .egovuiForm-responsive .egovuiForm-important .egovuiForm-important-close {
                            grid-area: l;
                            -ms-grid-row-align: center;
                            align-self: center;
                        }

                        .egovuiForm-responsive .egovuiForm-go-top .egovuiForm-go-top-button.egovuiForm-show {
                            display: none;
                        }
                    }

                    @media (min-width: 600px) {
                        .egovuiForm-responsive .egovuiForm-important .egovuiForm-important-title {
                            -ms-grid-row: 1;
                            -ms-grid-column: 1;
                        }

                        .egovuiForm-responsive .egovuiForm-important .egovuiForm-important-notice {
                            -ms-grid-row: 1;
                            -ms-grid-column: 2;
                        }

                        .egovuiForm-responsive .egovuiForm-important .egovuiForm-important-close {
                            -ms-grid-row: 1;
                            -ms-grid-column: 3;
                        }
                    }

                    .egovuiForm-pc body {
                        min-width: 120rem;
                    }

                    .egovuiForm-pc body .egovuiForm-contents-width {
                        width: 116.8rem;
                    }

                    .egovuiForm-pc .egovuiForm-pc-hide {
                        display: none !important;
                    }

                    .egovuiForm-pc main {
                        display: block;
                        width: 120rem;
                        margin: auto;
                        padding: 6rem 0;
                    }

                    .egovuiForm-pc .egovuiForm-header {
                        display: flex;
                        flex-flow: row nowrap;
                        justify-content: center;
                        align-items: center;
                        height: 6.7rem;
                        padding-left: 0;
                        border-bottom: #CCCFD1 0.1rem solid;
                    }

                    .egovuiForm-pc .egovuiForm-header .egovuiForm-header-inner {
                        display: flex;
                        flex-flow: row nowrap;
                        justify-content: flex-start;
                        align-items: center;
                        width: 116.8rem;
                    }

                    .egovuiForm-pc .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info {
                        font-size: 1.6rem;
                        flex: 1 1 auto;
                        display: flex;
                        justify-content: flex-end;
                        align-items: center;
                    }

                    .egovuiForm-pc .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info a {
                        color: #1042A4;
                        text-decoration: none;
                    }

                    .egovuiForm-pc .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info a:hover {
                        text-decoration: underline;
                    }

                    .egovuiForm-pc .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info.egovuiForm-login-info>* {
                        margin-right: 2.8rem;
                    }

                    .egovuiForm-pc .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info.egovuiForm-search-info>* {
                        margin-right: 2.2rem;
                    }

                    .egovuiForm-pc .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info .egovuiForm-search {
                        font-size: 1.4rem;
                        width: 29.2rem;
                    }

                    .egovuiForm-pc .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info .egovuiForm-last-login-date {
                        margin-right: 2.8rem;
                        font-size: 1.2rem;
                    }

                    .egovuiForm-pc .egovuiForm-header .egovuiForm-header-inner .egovuiForm-logo {
                        display: block;
                        width: 14.3rem;
                        height: 2.6rem;
                        background-size: contain;
                        background-repeat: no-repeat;
                        margin-right: 0.9rem;
                    }

                    .egovuiForm-pc .egovuiForm-header .egovuiForm-header-inner .egovuiForm-title {
                        font-weight: bold;
                        font-size: 2.2rem;
                    }

                    .egovuiForm-pc .egovuiForm-header.egovuiForm-browser-setting-header {
                        border-bottom: 0.2rem solid #1042A4;
                    }

                    .egovuiForm-pc .egovuiForm-header.egovuiForm-browser-setting-header .egovuiForm-header-inner>.egovuiForm-link {
                        display: inline;
                    }

                    .egovuiForm-pc .egovuiForm-nav {
                        display: flex;
                        justify-content: center;
                        height: 5.4rem;
                        background: none;
                        font-weight: normal;
                        border-bottom: #1042A4 0.2rem solid;
                    }

                    .egovuiForm-pc .egovuiForm-nav.egovuiForm-client {
                        border-bottom: #1042A4 0.2rem solid;
                    }

                    .egovuiForm-pc .egovuiForm-nav .egovuiForm-nav-sp-header,
                    .egovuiForm-pc .egovuiForm-nav .egovuiForm-nav-sp-footer {
                        display: none;
                    }

                    .egovuiForm-pc .egovuiForm-nav .egovuiForm-nav-inner {
                        display: flex;
                        flex-flow: row nowrap;
                        width: 116.8rem;
                    }

                    .egovuiForm-pc .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons {
                        display: flex;
                        flex-flow: row nowrap;
                        flex: 1 1 0rem;
                    }

                    .egovuiForm-pc .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons a {
                        display: flex;
                        position: relative;
                        flex-flow: row wrap;
                        justify-content: center;
                        align-items: center;
                        padding: 0 3rem;
                        height: 5.2rem;
                        font-size: 1.6rem;
                        text-decoration: none;
                    }

                    .egovuiForm-pc .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons a::after {
                        content: "";
                        position: absolute;
                        top: 0;
                        right: 0;
                        bottom: 0;
                        margin: auto;
                        background-color: #707070;
                        opacity: 0.3;
                        height: 2rem;
                        width: 0.1rem;
                    }

                    .egovuiForm-pc .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons a:last-child::after {
                        content: none;
                    }

                    .egovuiForm-pc .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons a.egovuiForm-active {
                        font-weight: bold;
                    }

                    .egovuiForm-pc .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons a.egovuiForm-active::before {
                        content: "";
                        position: absolute;
                        bottom: 0;
                        left: 0;
                        right: 0;
                        height: 0.5rem;
                        background-color: #1042A4;
                    }

                    .egovuiForm-pc .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons a:hover:not(.egovuiForm-active) {
                        background-color: #F5F6F8;
                        text-decoration: underline;
                    }

                    .egovuiForm-pc .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-textlink.egovuiForm-after-arrow {
                        -ms-grid-row-align: center;
                        align-self: center;
                    }

                    .egovuiForm-pc .egovuiForm-footer {
                        text-align: center;
                        padding: 2.25rem 0;
                    }

                    .egovuiForm-pc .egovuiForm-footer .egovuiForm-footer-items {
                        justify-content: center;
                        margin-bottom: 1.55rem;
                    }

                    .egovuiForm-pc .egovuiForm-footer .egovuiForm-copyright {
                        font-size: 1.2rem;
                    }

                    .egovuiForm-pc .egovuiForm-eyecatch-description {
                        margin-bottom: 3rem;
                        font-size: 1.6rem;
                    }

                    .egovuiForm-pc .egovuiForm-accordion.egovuiForm-view-pc input {
                        pointer-events: none;
                    }

                    .egovuiForm-pc .egovuiForm-accordion.egovuiForm-view-pc .egovuiForm-accordion-header {
                        cursor: auto;
                        pointer-events: none;
                    }

                    .egovuiForm-pc .egovuiForm-accordion.egovuiForm-view-pc .egovuiForm-accordion-header::after {
                        display: none;
                    }

                    .egovuiForm-pc .egovuiForm-accordion.egovuiForm-view-pc .egovuiForm-accordion-body {
                        transition: none;
                        height: auto !important;
                        visibility: visible !important;
                    }

                    @media (min-width: 600px) {
                        .egovuiForm-responsive body {
                            min-width: 120rem;
                        }

                        .egovuiForm-responsive body .egovuiForm-contents-width {
                            width: 116.8rem;
                        }

                        .egovuiForm-responsive .egovuiForm-pc-hide {
                            display: none !important;
                        }

                        .egovuiForm-responsive main {
                            display: block;
                            width: 120rem;
                            margin: auto;
                            padding: 6rem 0;
                        }

                        .egovuiForm-responsive .egovuiForm-header {
                            display: flex;
                            flex-flow: row nowrap;
                            justify-content: center;
                            align-items: center;
                            height: 6.7rem;
                            padding-left: 0;
                            border-bottom: #CCCFD1 0.1rem solid;
                        }

                        .egovuiForm-responsive .egovuiForm-header .egovuiForm-header-inner {
                            display: flex;
                            flex-flow: row nowrap;
                            justify-content: flex-start;
                            align-items: center;
                            width: 116.8rem;
                        }

                        .egovuiForm-responsive .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info {
                            font-size: 1.6rem;
                            flex: 1 1 auto;
                            display: flex;
                            justify-content: flex-end;
                            align-items: center;
                        }

                        .egovuiForm-responsive .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info a {
                            color: #1042A4;
                            text-decoration: none;
                        }

                        .egovuiForm-responsive .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info a:hover {
                            text-decoration: underline;
                        }

                        .egovuiForm-responsive .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info.egovuiForm-login-info>* {
                            margin-right: 2.8rem;
                        }

                        .egovuiForm-responsive .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info.egovuiForm-search-info>* {
                            margin-right: 2.2rem;
                        }

                        .egovuiForm-responsive .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info .egovuiForm-search {
                            font-size: 1.4rem;
                            width: 29.2rem;
                        }

                        .egovuiForm-responsive .egovuiForm-header .egovuiForm-header-inner .egovuiForm-info .egovuiForm-last-login-date {
                            margin-right: 2.8rem;
                            font-size: 1.2rem;
                        }

                        .egovuiForm-responsive .egovuiForm-header .egovuiForm-header-inner .egovuiForm-logo {
                            display: block;
                            width: 14.3rem;
                            height: 2.6rem;
                            background-size: contain;
                            background-repeat: no-repeat;
                            margin-right: 0.9rem;
                        }

                        .egovuiForm-responsive .egovuiForm-header .egovuiForm-header-inner .egovuiForm-title {
                            font-weight: bold;
                            font-size: 2.2rem;
                        }

                        .egovuiForm-responsive .egovuiForm-header.egovuiForm-browser-setting-header {
                            border-bottom: 0.2rem solid #1042A4;
                        }

                        .egovuiForm-responsive .egovuiForm-header.egovuiForm-browser-setting-header .egovuiForm-header-inner>.egovuiForm-link {
                            display: inline;
                        }

                        .egovuiForm-responsive .egovuiForm-nav {
                            display: flex;
                            justify-content: center;
                            height: 5.4rem;
                            background: none;
                            font-weight: normal;
                            border-bottom: #1042A4 0.2rem solid;
                        }

                        .egovuiForm-responsive .egovuiForm-nav.egovuiForm-client {
                            border-bottom: #1042A4 0.2rem solid;
                        }

                        .egovuiForm-responsive .egovuiForm-nav .egovuiForm-nav-sp-header,
                        .egovuiForm-responsive .egovuiForm-nav .egovuiForm-nav-sp-footer {
                            display: none;
                        }

                        .egovuiForm-responsive .egovuiForm-nav .egovuiForm-nav-inner {
                            display: flex;
                            flex-flow: row nowrap;
                            width: 116.8rem;
                        }

                        .egovuiForm-responsive .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons {
                            display: flex;
                            flex-flow: row nowrap;
                            flex: 1 1 0rem;
                        }

                        .egovuiForm-responsive .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons a {
                            display: flex;
                            position: relative;
                            flex-flow: row wrap;
                            justify-content: center;
                            align-items: center;
                            padding: 0 3rem;
                            height: 5.2rem;
                            font-size: 1.6rem;
                            text-decoration: none;
                        }

                        .egovuiForm-responsive .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons a::after {
                            content: "";
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            margin: auto;
                            background-color: #707070;
                            opacity: 0.3;
                            height: 2rem;
                            width: 0.1rem;
                        }

                        .egovuiForm-responsive .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons a:last-child::after {
                            content: none;
                        }

                        .egovuiForm-responsive .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons a.egovuiForm-active {
                            font-weight: bold;
                        }

                        .egovuiForm-responsive .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons a.egovuiForm-active::before {
                            content: "";
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            height: 0.5rem;
                            background-color: #1042A4;
                        }

                        .egovuiForm-responsive .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-nav-buttons a:hover:not(.egovuiForm-active) {
                            background-color: #F5F6F8;
                            text-decoration: underline;
                        }

                        .egovuiForm-responsive .egovuiForm-nav .egovuiForm-nav-inner .egovuiForm-textlink.egovuiForm-after-arrow {
                            -ms-grid-row-align: center;
                            align-self: center;
                        }

                        .egovuiForm-responsive .egovuiForm-footer {
                            text-align: center;
                            padding: 2.25rem 0;
                        }

                        .egovuiForm-responsive .egovuiForm-footer .egovuiForm-footer-items {
                            justify-content: center;
                            margin-bottom: 1.55rem;
                        }

                        .egovuiForm-responsive .egovuiForm-footer .egovuiForm-copyright {
                            font-size: 1.2rem;
                        }

                        .egovuiForm-responsive .egovuiForm-eyecatch-description {
                            margin-bottom: 3rem;
                            font-size: 1.6rem;
                        }

                        .egovuiForm-responsive .egovuiForm-accordion.egovuiForm-view-pc input {
                            pointer-events: none;
                        }

                        .egovuiForm-responsive .egovuiForm-accordion.egovuiForm-view-pc .egovuiForm-accordion-header {
                            cursor: auto;
                            pointer-events: none;
                        }

                        .egovuiForm-responsive .egovuiForm-accordion.egovuiForm-view-pc .egovuiForm-accordion-header::after {
                            display: none;
                        }

                        .egovuiForm-responsive .egovuiForm-accordion.egovuiForm-view-pc .egovuiForm-accordion-body {
                            transition: none;
                            height: auto !important;
                            visibility: visible !important;
                        }
                    }

                    body.egovuiForm-maxw-auto .egovuiForm-wizard {
                        max-width: none;
                    }

                    body.egovuiForm-input-application {
                        display: flex;
                        flex-flow: column nowrap;
                        height: 100%;
                        width: 100%;
                        margin: 0;
                        padding: 0;
                        line-height: 1.5;
                        font-family: 'Meiryo', sans-serif;
                        font-size: 1.6rem;
                        color: #333333;
                        pointer-events: none;
                    }

                    body.egovuiForm-input-application button {
                        outline: 0;
                        border: 0;
                        cursor: pointer;
                    }

                    body.egovuiForm-input-application .egovuiForm-mt2 {
                        margin-top: 0.2rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-mt3 {
                        margin-top: 0.3rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-mt6 {
                        margin-top: 0.6rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-mt30 {
                        margin-top: 3rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-mt14 {
                        margin-top: 1.4rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-lh16 {
                        line-height: 1.6rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-header .egovuiForm-logo {
                        cursor: pointer;
                        background-repeat: no-repeat;
                        background-image: url("../../common/img/logo.svg");
                    }

                    body.egovuiForm-input-application .egovuiForm-header .egovuiForm-header-inner>.egovuiForm-link {
                        display: none;
                    }

                    body.egovuiForm-input-application .egovuiForm-footer {
                        background: #636974;
                        color: #FFFFFF;
                    }

                    body.egovuiForm-input-application .egovuiForm-footer .egovuiForm-footer-items {
                        display: inline-flex;
                        flex-flow: row wrap;
                        align-items: center;
                        font-size: 1.4rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-footer .egovuiForm-footer-items a {
                        text-decoration: none;
                        margin-right: 2.4rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-footer .egovuiForm-footer-items a:last-child {
                        margin-right: 0;
                    }

                    body.egovuiForm-input-application .egovuiForm-footer .egovuiForm-footer-items a:hover {
                        text-decoration: underline;
                    }

                    body.egovuiForm-input-application .egovuiForm-footer .egovuiForm-copyright {
                        display: block;
                    }

                    body.egovuiForm-input-application .egovuiForm-login-name {
                        cursor: pointer;
                        position: relative;
                        display: flex;
                        flex-flow: row nowrap;
                        align-items: center;
                        padding-left: 1em;
                    }

                    body.egovuiForm-input-application .egovuiForm-login-name::before {
                        content: "";
                        display: inline-block;
                        background-color: #F5F6F8;
                        background-image: url(../../common/img/person.svg);
                        background-repeat: no-repeat;
                        background-size: 1em 1em;
                        background-position: center;
                        border-radius: 50%;
                        width: 1.72em;
                        height: 1.72em;
                        margin-right: 0.5em;
                    }

                    body.egovuiForm-input-application .egovuiForm-login-name:hover {
                        text-decoration: underline;
                    }

                    body.egovuiForm-input-application .egovuiForm-login-account-wrapper {
                        position: relative;
                    }

                    body.egovuiForm-input-application .egovuiForm-login-account-wrapper .egovuiForm-header-menu-list {
                        display: none;
                        position: absolute;
                        z-index: 10;
                        top: 3.8rem;
                        left: -12rem;
                        width: 28rem;
                        border: 0.1rem solid #E5EBF5;
                        background-color: #FFFFFF;
                    }

                    body.egovuiForm-input-application .egovuiForm-login-account-wrapper .egovuiForm-header-menu-list.egovuiForm-show {
                        display: block;
                    }

                    body.egovuiForm-input-application .egovuiForm-login-account-wrapper .egovuiForm-header-menu-list>li {
                        height: 6rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-login-account-wrapper .egovuiForm-header-menu-list>li:not(:last-child) {
                        border-bottom: 0.1rem solid #E5EBF5;
                    }

                    body.egovuiForm-input-application .egovuiForm-login-account-wrapper .egovuiForm-header-menu-list>li>a {
                        cursor: pointer;
                        display: flex;
                        width: 100%;
                        height: 100%;
                        padding-left: 2rem;
                        align-items: center;
                        justify-content: flex-start;
                        color: #000000 !important;
                    }

                    body.egovuiForm-input-application .egovuiForm-dialog-content {
                        background-color: transparent !important;
                    }

                    body.egovuiForm-input-application ul {
                        margin: 0;
                        padding: 0;
                        list-style: none;
                    }

                    body.egovuiForm-input-application .egovuiForm-normal-button {
                        min-width: 20rem;
                        min-height: 4.8rem;
                        padding: 0 1.8rem;
                        border: 0.1rem solid #1042A4;
                        border-radius: 0.3rem;
                        background: #FFFFFF;
                        font-size: 1.6rem;
                        color: #1042A4;
                        cursor: pointer;
                    }

                    body.egovuiForm-input-application .egovuiForm-normal-button:hover {
                        text-decoration: underline;
                    }

                    body.egovuiForm-input-application .egovuiForm-normal-button.egovuiForm-h36 {
                        min-width: 12.6rem;
                        min-height: 3.6rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-normal-button.egovuiForm-bookmark::before {
                        content: '';
                        display: inline-block;
                        width: 1rem;
                        height: 1.5rem;
                        margin-right: 0.8rem;
                        background-image: url("../../common/img/icon-bookmark.svg");
                        background-repeat: no-repeat;
                        background-size: contain;
                        vertical-align: middle;
                    }

                    body.egovuiForm-input-application .egovuiForm-normal-button.egovuiForm-checkmark {
                        pointer-events: none;
                    }

                    body.egovuiForm-input-application .egovuiForm-normal-button.egovuiForm-checkmark::before {
                        content: '';
                        display: inline-block;
                        width: 1.5rem;
                        height: 1.5rem;
                        margin-right: 1.7rem;
                        background-image: url("../../common/img/icon-checkmark.svg");
                        background-repeat: no-repeat;
                        background-size: contain;
                        vertical-align: middle;
                    }

                    body.egovuiForm-input-application .egovuiForm-normal-button.egovuiForm-maintenance {
                        pointer-events: none;
                        border: 0;
                        background-color: #C2CEE7;
                        color: #565656;
                    }

                    body.egovuiForm-input-application .egovuiForm-normal-button.egovuiForm-preview::before {
                        content: '';
                        display: inline-block;
                        width: 1.6rem;
                        height: 1.8rem;
                        padding-right: 0.4rem;
                        background-image: url("../../common/img/icon-preview.svg");
                        background-repeat: no-repeat;
                        background-size: contain;
                        vertical-align: middle;
                    }

                    body.egovuiForm-input-application .egovuiForm-normal-button.egovuiForm-confirm::after {
                        content: '';
                        display: inline-block;
                        width: 1.5rem;
                        height: 1.5rem;
                        margin-left: 1rem;
                        background-image: url("../../common/img/icon-confirm.svg");
                        background-repeat: no-repeat;
                        background-size: 1.5rem 1.5rem;
                        vertical-align: middle;
                    }

                    body.egovuiForm-input-application .egovuiForm-submit-button {
                        min-width: 20rem;
                        padding: 0 1.8rem;
                        border: 0;
                        outline: 0;
                        border-radius: 0.3rem;
                        min-height: 4.8rem;
                        background-color: #1042A4;
                        font-size: 1.6rem;
                        color: #FFFFFF;
                        cursor: pointer;
                    }

                    body.egovuiForm-input-application .egovuiForm-submit-button:hover {
                        text-decoration: underline;
                    }

                    body.egovuiForm-input-application .egovuiForm-submit-button.egovuiForm-h36 {
                        min-width: 12.6rem;
                        min-height: 3.6rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-submit-button.egovuiForm-h56 {
                        min-width: 36rem;
                        min-height: 5.6rem;
                        font-size: 2rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-submit-button.egovuiForm-h66 {
                        min-width: 43rem;
                        min-height: 6.6rem;
                        font-size: 1.8rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-submit-button.egovuiForm-w200 {
                        min-width: 20rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-submit-button.egovuiForm-h32 {
                        min-width: 12.6rem;
                        min-height: 3.2rem;
                        padding: 0 1rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-submit-button.egovuiForm-bold {
                        font-weight: bold;
                    }

                    body.egovuiForm-input-application .egovuiForm-submit-button.egovuiForm-gray {
                        background-color: #D7D7D7;
                        color: #333333;
                    }

                    body.egovuiForm-input-application .egovuiForm-submit-button.egovuiForm-gray-highlight {
                        background-color: #636974;
                    }

                    body.egovuiForm-input-application .egovuiForm-submit-button.egovuiForm-contain-arrow {
                        position: relative;
                    }

                    body.egovuiForm-input-application .egovuiForm-submit-button.egovuiForm-contain-arrow::after {
                        content: '';
                        position: absolute;
                        display: inline-block;
                        width: 0.7rem;
                        height: 1.1rem;
                        top: calc((100% - 1.1rem) / 2);
                        right: 1.8rem;
                        background-image: url(../../common/img/icon-inside-button-arrow.svg);
                        background-repeat: no-repeat;
                        background-size: auto;
                        vertical-align: middle;
                    }

                    body.egovuiForm-input-application .egovuiForm-link {
                        cursor: pointer;
                        text-decoration: none;
                        font-size: 1.6rem;
                        font-weight: normal;
                        color: #1042A4;
                    }

                    body.egovuiForm-input-application .egovuiForm-link:hover {
                        text-decoration: underline;
                    }

                    body.egovuiForm-input-application .egovuiForm-link.egovuiForm-new-window::after {
                        content: "";
                        display: inline-block;
                        width: 2rem;
                        height: 2rem;
                        margin-left: 1rem;
                        background-image: url("../../common/img/icon-confirm.svg");
                        background-repeat: no-repeat;
                        background-size: auto;
                        vertical-align: middle;
                    }

                    body.egovuiForm-input-application .egovuiForm-link.egovuiForm-rss::before {
                        content: '';
                        display: inline-block;
                        width: 1.5rem;
                        height: 1.5rem;
                        margin-right: 0.5rem;
                        background-image: url("../../common/img/icon-rss.svg");
                        background-repeat: no-repeat;
                        background-size: contain;
                        vertical-align: unset;
                    }

                    body.egovuiForm-input-application .egovuiForm-link.egovuiForm-list::before {
                        content: '';
                        display: inline-block;
                        width: 1.7rem;
                        height: 1.5rem;
                        margin-right: 0.5rem;
                        margin-bottom: 0.3rem;
                        background-image: url("../../common/img/icon-list.svg");
                        background-repeat: no-repeat;
                        background-size: contain;
                        vertical-align: middle;
                    }

                    body.egovuiForm-input-application .egovuiForm-link.egovuiForm-close {
                        margin: 1.8rem 0 5rem 0;
                    }

                    body.egovuiForm-input-application .egovuiForm-link.egovuiForm-sort {
                        margin-right: 0.8rem;
                        color: #636974;
                        font-weight: normal;
                        font-size: 1.4rem;
                        white-space: nowrap;
                    }

                    body.egovuiForm-input-application .egovuiForm-link.egovuiForm-sort::after {
                        content: '';
                        display: inline-block;
                        width: 0.9rem;
                        height: 0.9rem;
                        margin-bottom: -0.1rem;
                        margin-left: 0.3rem;
                        background-image: url("../../common/img/icon-sort-arrow-inactive.svg");
                        background-repeat: no-repeat;
                        background-size: contain;
                    }

                    body.egovuiForm-input-application .egovuiForm-link.egovuiForm-sort.egovuiForm-desc {
                        margin-right: 0;
                    }

                    body.egovuiForm-input-application .egovuiForm-link.egovuiForm-sort.egovuiForm-desc::after {
                        transform: rotate(180deg);
                        margin-bottom: 0.4rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-link.egovuiForm-sort.egovuiForm-active {
                        color: #1042A4;
                        font-weight: bold;
                    }

                    body.egovuiForm-input-application .egovuiForm-link.egovuiForm-sort.egovuiForm-active::after {
                        background-image: url("../../common/img/icon-sort-arrow.svg");
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard {
                        display: flex;
                        flex-flow: row nowrap;
                        max-width: 116.8rem;
                        margin: 0 auto;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li {
                        flex: 1 1 1rem;
                        text-align: center;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li>span {
                        display: flex;
                        position: relative;
                        align-items: center;
                        justify-content: center;
                        height: 4.8rem;
                        background-color: #F5F6F8;
                        border-top: 0.1rem solid #C6C9D3;
                        border-bottom: 0.1rem solid #C6C9D3;
                        color: #636974;
                        font-size: 1.6rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li>span::before {
                        content: "";
                        position: absolute;
                        width: 0;
                        height: 0;
                        top: 0;
                        right: -3.2rem;
                        border-top: 2.3rem solid transparent;
                        border-bottom: 2.3rem solid transparent;
                        border-left: 3.2rem solid #F5F6F8;
                        z-index: 2;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li>span::after {
                        content: "";
                        position: absolute;
                        width: 0;
                        height: 0;
                        top: -0.1rem;
                        right: -3.4rem;
                        border-top: 2.4rem solid transparent;
                        border-bottom: 2.4rem solid transparent;
                        border-left: 3.3rem solid #C6C9D3;
                        z-index: 1;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li:first-child {
                        flex-basis: 0;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li:first-child>span {
                        border-left: 0.1rem solid #C6C9D3;
                        border-radius: 0.3rem 0 0 0.3rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li:not(:first-child) {
                        border-left: 0.1rem solid #C6C9D3;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li:not(:first-child)>span {
                        padding-left: 1.6rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li:last-child>span {
                        border-right: 0.1rem solid #C6C9D3;
                        border-radius: 0 0.3rem 0.3rem 0;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li:last-child>span::before,
                    body.egovuiForm-input-application .egovuiForm-wizard>li:last-child>span::after {
                        display: none;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li.egovuiForm-active>span {
                        background-color: #1042A4;
                        border-color: #1042A4;
                        border-left-color: #C6C9D3;
                        color: #FFFFFF;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li.egovuiForm-active>span::before {
                        top: -0.1rem;
                        right: -3.2rem;
                        border-top-width: 2.4rem;
                        border-bottom-width: 2.4rem;
                        border-left: 3.3rem solid #1042A4;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li.egovuiForm-active>span::after {
                        border-left-color: #1042A4;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li.egovuiForm-active:first-child>span {
                        border-left-color: #1042A4;
                    }

                    body.egovuiForm-input-application .egovuiForm-wizard>li.egovuiForm-active+li {
                        border-left-color: #1042A4;
                    }

                    body.egovuiForm-input-application .egovuiForm-eyecatch {
                        display: flex;
                        align-items: center;
                        position: relative;
                        padding-left: 2rem;
                        font-size: 2rem;
                        font-weight: bold;
                    }

                    body.egovuiForm-input-application .egovuiForm-eyecatch::before {
                        content: "";
                        position: absolute;
                        top: -0.2rem;
                        left: 0;
                        width: 0.4rem;
                        height: 2.6rem;
                        background-color: #1042A4;
                    }

                    body.egovuiForm-input-application .egovuiForm-form-validation-area {
                        display: none;
                        margin-bottom: 3rem;
                        padding: 2rem;
                        background-color: #FFEBEB;
                        border: 0.1rem solid #EED4D4;
                        text-align: left;
                    }

                    body.egovuiForm-input-application .egovuiForm-form-validation-area>h3 {
                        position: relative;
                        margin-top: 0;
                        margin-bottom: 0.8rem;
                        padding-left: 2.2rem;
                        font-size: 1.4rem;
                        color: #CA241E;
                    }

                    body.egovuiForm-input-application .egovuiForm-form-validation-area>h3::before {
                        content: "";
                        position: absolute;
                        width: 1.5rem;
                        height: 1.5rem;
                        top: 0.2rem;
                        left: 0;
                        background-image: url("../../common/img/icon-important.svg");
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 1.5rem 1.5rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-form-validation-area .egovuiForm-application-form-validation-list {
                        padding-left: 2.2rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-form-validation-area .egovuiForm-application-form-validation-list>li {
                        color: #CA241E;
                        font-size: 1.4rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-form-validation-area .egovuiForm-application-form-validation-list>li::before {
                        content: "・";
                    }

                    body.egovuiForm-input-application .egovuiForm-form-validation-area .egovuiForm-application-form-validation-list>li .egovuiForm-validation-title {
                        margin-right: 1rem;
                        font-weight: bold;
                    }

                    body.egovuiForm-input-application .egovuiForm-form-validation-area.egovuiForm-validation-show {
                        display: block;
                    }

                    body.egovuiForm-input-application form {
                        background-color: #F5F6F8;
                    }

                    body.egovuiForm-input-application .egovuiForm-group-title {
                        margin-top: 5rem;
                        margin-bottom: 3rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-group-title .egovuiForm-page-title {
                        padding-left: 0;
                    }

                    body.egovuiForm-input-application .egovuiForm-group-title>h1 {
                        margin: 0;
                        padding-left: 1.6rem;
                        font-size: 3.2rem;
                        font-weight: normal;
                    }

                    body.egovuiForm-input-application .egovuiForm-page-description {
                        margin-bottom: 5.8rem;
                        padding-left: 0;
                        font-size: 1.6rem;
                    }

                    body.egovuiForm-input-application>main {
                        -ms-grid-row-align: center;
                        align-self: center;
                        display: inline-block;
                        flex: 1 0 auto;
                        width: auto;
                        max-width: 160rem;
                        min-width: 120rem;
                        padding: 3.3rem 1.6rem 6rem;
                    }

                    body.egovuiForm-input-application>header,
                    body.egovuiForm-input-application>footer,
                    body.egovuiForm-input-application>nav {
                        flex: 0 0 auto;
                    }

                    body.egovuiForm-input-application section {
                        margin-bottom: 5.8rem;
                    }

                    body.egovuiForm-input-application section:last-of-type {
                        margin-bottom: 6rem;
                    }

                    body.egovuiForm-input-application section .egovuiForm-section-title {
                        margin-top: 0;
                        margin-bottom: 2.4rem;
                        font-size: 2rem;
                    }

                    body.egovuiForm-input-application section .egovuiForm-section-title .egovuiForm-section-title-num {
                        margin-right: 0.6rem;
                        font-size: 2.8rem;
                        color: #1042A4;
                    }

                    body.egovuiForm-input-application section .egovuiForm-section-subtitle {
                        margin: 3rem 0;
                        padding-left: 2rem;
                        font-size: 1.8rem;
                    }

                    body.egovuiForm-input-application section .egovuiForm-section-description {
                        margin-bottom: 3rem;
                    }

                    body.egovuiForm-input-application section .egovuiForm-bg-area {
                        padding: 1.6rem 2rem 2.6rem;
                        background-color: #F5F6F8;
                    }

                    body.egovuiForm-input-application section .egovuiForm-bg-area .egovuiForm-eyecatch {
                        margin-top: 6rem;
                        margin-bottom: 2rem;
                    }

                    body.egovuiForm-input-application section .egovuiForm-bg-area .egovuiForm-eyecatch:first-of-type {
                        margin-top: 4.4rem;
                    }

                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal {
                        margin-top: 1.2rem;
                        width: 100%;
                        font-size: 1.6rem;
                    }

                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal th,
                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal td {
                        padding: 0.9rem 1.8rem;
                    }

                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal th .egovuiForm-flex-row>div:not(:first-child),
                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal td .egovuiForm-flex-row>div:not(:first-child) {
                        margin-left: 1.2rem;
                    }

                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal .egovuiForm-td-error-message {
                        display: none;
                        align-items: center;
                        color: #D23F3A;
                        font-weight: bold;
                    }

                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal .egovuiForm-td-error-message::before {
                        content: "";
                        display: inline-block;
                        width: 1.5rem;
                        height: 1.5rem;
                        margin-top: -0.2rem;
                        margin-right: 0.6rem;
                        background-image: url(../../common/img/icon-important.svg);
                        background-repeat: no-repeat;
                        background-position: center;
                    }

                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal td.egovuiForm-td-invalid {
                        background-color: #FFEBEB;
                    }

                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal td.egovuiForm-td-invalid .egovuiForm-td-error-message {
                        display: flex;
                    }

                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal.egovuiForm-th160 th {
                        width: 16rem;
                    }

                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal.egovuiForm-th160 th,
                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal.egovuiForm-th160 td {
                        padding-top: 0.8rem;
                        padding-bottom: 0.8rem;
                    }

                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal.egovuiForm-th180 th {
                        width: 18rem;
                    }

                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal.egovuiForm-th440 th {
                        width: 44rem;
                        max-width: 44rem;
                    }

                    body.egovuiForm-input-application section .egovuiForm-normal-horizontal.egovuiForm-th440 td {
                        vertical-align: top;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid {
                        display: -ms-grid;
                        display: grid;
                        -ms-grid-rows: auto auto;
                        grid-template-rows: auto auto;
                        -ms-grid-columns: 32.6rem 1fr;
                        grid-template-columns: 32.6rem 1fr;
                        padding-right: 2rem;
                        background-color: #F5F6F8;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper {
                        -ms-grid-row: 1;
                        -ms-grid-row-span: 2;
                        grid-row: 1 / 3;
                        -ms-grid-column: 1;
                        grid-column: 1;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-eyecatch {
                        margin-top: 6rem;
                        margin-left: 2rem;
                        font-size: 1.8rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-eyecatch::before {
                        top: 0;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list {
                        position: relative;
                        margin-top: 3rem;
                        margin-bottom: 1rem;
                        background-color: #FFFFFF;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list>li {
                        height: 9.3rem;
                        border-top: 0.1rem solid #C6C9D3;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list>li:last-child {
                        border-bottom: 0.1rem solid #C6C9D3;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list>li .egovuiForm-list-item-eyecatch {
                        position: absolute;
                        top: 0.1rem;
                        height: 9.1rem;
                        width: 0.2rem;
                        background-color: #1042A4;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list>li>a {
                        display: flex;
                        flex-flow: column nowrap;
                        position: relative;
                        padding: 1.2rem 2rem 2rem 2rem;
                        border-left: 0.2rem solid transparent;
                        text-decoration: none;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list>li>a.egovuiForm-invalid {
                        background-color: #FFEBEB;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list>li>a.egovuiForm-active {
                        background-color: #FFFFFF;
                        border-left-color: #1042A4;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list>li>a.egovuiForm-active span:not([class]) {
                        font-weight: bold;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list>li>a:not(.egovuiForm-required-item):hover::after {
                        content: "";
                        position: absolute;
                        top: 0;
                        right: 0;
                        width: 1.8rem;
                        height: 1.8rem;
                        background-image: url(../../common/img/icon-cancel.svg);
                        background-size: 0.9rem 0.9rem;
                        background-position: center;
                        background-repeat: no-repeat;
                        background-color: #E5EBF5;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list>li>a:not(.egovuiForm-required-item):hover:not(.egovuiForm-active) span:not([class]) {
                        text-decoration: underline;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list>li>a .egovuiForm-badge-area>span:not(:last-child) {
                        margin-right: 0.1rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list>li>a>span:not(:first-child) {
                        margin-top: 0.4rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list>li>a>span {
                        color: #333333;
                        font-size: 1.6rem;
                        font-weight: bold;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-style-list-wrapper .egovuiForm-application-style-list+.egovuiForm-flex-row {
                        padding: 0 2rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-form-button-area {
                        -ms-grid-row: 1;
                        grid-row: 1;
                        -ms-grid-column: 2;
                        grid-column: 2;
                        min-height: 164.4rem;
                        margin-top: 6rem;
                        padding: 3rem 3rem 2.5rem;
                        background-color: #FFFFFF;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-form-button-area.egovuiForm-short {
                        min-height: 99rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-form-button-area .egovuiForm-flex-row .egovuiForm-normal-button {
                        min-width: 14.6rem;
                        padding: 0;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-form-button-area .egovuiForm-flex-row .egovuiForm-normal-button+.egovuiForm-normal-button {
                        margin-left: 2rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-form-input-area {
                        -ms-grid-row: 2;
                        grid-row: 2;
                        -ms-grid-column: 2;
                        grid-column: 2;
                        padding: 0 2rem;
                        background-color: #FFFFFF;
                        text-align: center;
                        overflow-x: auto;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-form-input-area .egovuiForm-form-validation-area {
                        margin-right: 1rem;
                        margin-left: 1rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid .egovuiForm-application-form-input-area img {
                        margin: 0 -1.6rem 3rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-application-form-grid+.egovuiForm-bg-area>*:last-child {
                        margin-bottom: 3.4rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-charge-description {
                        margin-bottom: 2rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-charge-label {
                        margin-left: 0.7rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-charge {
                        margin-top: 0.6rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-charge::after {
                        content: "円";
                        margin-left: 1.3rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-charge .egovuiForm-account-form {
                        height: 4.2rem;
                        min-height: 4.2rem;
                        width: 29rem;
                        min-width: 29rem;
                        font-size: 1.6rem;
                        text-align: right;
                    }

                    body.egovuiForm-input-application .egovuiForm-next-procedure {
                        display: flex;
                        justify-content: space-between;
                        margin-top: -3rem;
                        margin-bottom: 6rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-next-procedure .egovuiForm-before-arrow {
                        color: #D7D7D7;
                    }

                    body.egovuiForm-input-application .egovuiForm-next-procedure .egovuiForm-after-arrow {
                        color: #1042A4;
                    }

                    body.egovuiForm-input-application .egovuiForm-footer-button-area {
                        display: flex;
                    }

                    body.egovuiForm-input-application .egovuiForm-footer-button-area button.egovuiForm-gray {
                        min-width: 14.6rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-footer-button-area button:not(.egovuiForm-gray) {
                        min-width: 21.8rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-footer-button-area button+button {
                        margin-left: 3rem;
                    }

                    body.egovuiForm-input-application .egovuiForm-footer-button-area .egovuiForm-link {
                        -ms-grid-row-align: center;
                        align-self: center;
                        margin-right: 3rem;
                    }

                    .egovuiForm-preview-legal-style {
                        margin-top: 3.2rem;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    html {
                        font-size: 10px !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    body.egovuiForm-dialog-open>header {
                        z-index: -10;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    body.egovuiForm-dialog-open>main {
                        z-index: -10;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    body.egovuiForm-dialog-open>footer {
                        z-index: -10;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    body.egovuiForm-dialog-open>nav {
                        z-index: 1;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style select {
                        padding-left: 0.7rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style select::-ms-value {
                        background: none;
                        color: inherit;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style select.egovuiForm-select-small {
                        padding-left: 0.4rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style select.egovuiForm-select-big {
                        padding-left: 1.2rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-standard-style select.egovuiForm-select-ie-edge-style {
                        padding-left: 0.3rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style select.egovuiForm-select-big.egovuiForm-select-ie-edge-style {
                        padding-left: 0.7rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    button {
                        font-family: 'Meiryo', sans-serif !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style input::-ms-clear {
                        display: none;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    span {
                        font-family: 'Meiryo', sans-serif !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style input[type="range"] {
                        height: auto !important;
                        width: 9.6rem !important;
                        margin: 1.5rem 0.1rem 0 0.1rem !important;
                        cursor: pointer !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style input[type="range"]::-ms-track {
                        width: 9.6rem !important;
                        height: 0.1rem !important;
                        cursor: pointer !important;
                        background: transparent !important;
                        border-color: transparent !important;
                        border-width: 1rem 0 1rem 0 !important;
                        color: transparent !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style input[type=range]::-ms-fill-lower {
                        border: 0.1rem solid #9E9E9E !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style input[type=range]::-ms-fill-upper {
                        border: 0.1rem solid #9E9E9E !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style input[type="range"]::-ms-thumb {
                        appearance: none !important;
                        height: 1rem !important;
                        width: 0.3rem !important;
                        margin-top: 0 !important;
                        background-color: #FFFFFF !important;
                        border: 0.1rem solid #1042A4 !important;
                        cursor: pointer !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style input[type="range"]:hover::-ms-thumb {
                        background-color: #DFE1E8 !important;
                        outline: none !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style input[type="range"]:focus::-ms-thumb {
                        background-color: #DFE1E8 !important;
                        outline: none !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-preview-style input[type="range"]::-ms-tooltip {
                        display: none !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-dialog>.egovuiForm-dialog-close-button img {
                        margin-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformation .egovuiForm-administrative-procedure-information-table-box .egovuiForm-trash-can-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformation .egovuiForm-administrative-procedure-information-table-box .egovuiForm-new-create-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformation .egovuiForm-administrative-procedure-information-table-box .egovuiForm-file-output-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformation .egovuiForm-procedure-information-table-box .egovuiForm-trash-can-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformation .egovuiForm-procedure-information-table-box .egovuiForm-add-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformation .egovuiForm-legal-form-table-box .egovuiForm-trash-can-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformation .egovuiForm-legal-form-table-box .egovuiForm-add-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-procedure-outline-wrapper {
                        margin-bottom: 1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-announcement-information-wrapper {
                        margin-bottom: 1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformationDetail #electronicApplicationMethodUsageGuideLinkInformationAndFileName {
                        margin-right: 1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-electronic-application-guide th:nth-child(1) {
                        width: 19% !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-electronic-application-guide th:nth-child(2) {
                        width: 40% !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-electronic-application-guide th:nth-child(3) {
                        width: 41% !important;
                        padding-left: 0.7em !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-electronic-application-guide td:nth-child(3) {
                        padding-left: 0.7rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-submitting-organization-candidate th:nth-child(1) {
                        width: 30% !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-submitting-organization-candidate th:nth-child(2) {
                        width: 35% !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-submitting-organization-candidate th:nth-child(3) {
                        width: 35% !important;
                        padding-left: 1.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-submitting-organization-candidate td:nth-child(3) {
                        padding-left: 1.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-attachment-allowed-format-wrapper {
                        width: 100% !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #standardForm .egovuiForm-preview-button img {
                        margin-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #standardForm .egovuiForm-preview-button img+span {
                        padding-left: 0.2rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #legalForm .egovuiForm-preview-button img {
                        margin-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #legalForm .egovuiForm-preview-button img+span {
                        padding-left: 0.2rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #rule .egovuiForm-mapping-information-wrapper h3 {
                        margin-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #screenImage h3 {
                        margin-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #screenImage .egovuiForm-type-wrapper {
                        width: 100% !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #MappingMethod+.egovuiForm-radio-wrapper {
                        margin-right: 1.8rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #applicationXml .egovuiForm-tree-header ul li .egovuiForm-add-button {
                        height: 100% !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #legalFormMaskingButton img {
                        margin-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #dialogStyleVersionControl .egovuiForm-dialog-table tbody td:nth-child(7) {
                        padding-left: 0.2rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    #dialogAddFeeInformation .egovuiForm-dialog-contents .egovuiForm-form .egovuiForm-required-ie-style {
                        min-width: 1.2rem !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-dialog-wrapper {
                        z-index: 400;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-dialog-wrapper .egovuiForm-dialog {
                        position: relative !important;
                        top: auto !important;
                        right: auto !important;
                        bottom: auto !important;
                        left: auto !important;
                        margin: 0 !important;
                    }

                    _:-ms-lang(x)::-ms-backdrop,
                    .egovuiForm-dialog-wrapper .backdrop+.egovuiForm-dialog {
                        position: fixed !important;
                        top: 50% !important;
                        right: 0 !important;
                        bottom: 50% !important;
                        left: 0 !important;
                        margin: auto !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style select {
                        padding-left: 0.6rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style select.egovuiForm-select-small {
                        padding-left: 0.3rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style select.egovuiForm-select-big {
                        padding-left: 1.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-standard-style select.egovuiForm-select-ie-edge-style {
                        padding-left: 0.2rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style select.egovuiForm-select-big.egovuiForm-select-ie-edge-style {
                        padding-left: 0.6rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    button {
                        font-family: 'Meiryo', sans-serif !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style input::-ms-clear {
                        display: none;
                    }

                    _:-ms-lang(x)::backdrop,
                    span {
                        font-family: 'Meiryo', sans-serif !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style input[type="range"] {
                        height: auto !important;
                        width: 9.6rem !important;
                        margin: 0 0.1rem 0 0.1rem !important;
                        cursor: pointer !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style input[type="range"]::-ms-track {
                        width: 9.6rem !important;
                        height: 0.1rem !important;
                        cursor: pointer !important;
                        background: transparent !important;
                        border-color: transparent !important;
                        border-width: 1rem 0 1rem 0 !important;
                        color: transparent !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style input[type=range]::-ms-fill-lower {
                        border: 0.1rem solid #9E9E9E !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style input[type=range]::-ms-fill-upper {
                        border: 0.1rem solid #9E9E9E !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style input[type="range"]::-ms-thumb {
                        appearance: none !important;
                        height: 1rem !important;
                        width: 0.3rem !important;
                        margin-top: 0 !important;
                        background-color: #FFFFFF !important;
                        border: 0.1rem solid #1042A4 !important;
                        cursor: pointer !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style input[type="range"]:hover::-ms-thumb {
                        background-color: #DFE1E8 !important;
                        outline: none !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style input[type="range"]:focus::-ms-thumb {
                        background-color: #DFE1E8 !important;
                        outline: none !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style input[type="range"].egovuiForm-radio-focus-edge::-ms-thumb {
                        background-color: #DFE1E8 !important;
                        outline: none !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-style input[type="range"]::-ms-tooltip {
                        display: none !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-dialog>.egovuiForm-dialog-close-button img {
                        margin-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformation .egovuiForm-administrative-procedure-information-table-box .egovuiForm-trash-can-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformation .egovuiForm-administrative-procedure-information-table-box .egovuiForm-new-create-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformation .egovuiForm-administrative-procedure-information-table-box .egovuiForm-file-output-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformation .egovuiForm-procedure-information-table-box .egovuiForm-trash-can-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformation .egovuiForm-procedure-information-table-box .egovuiForm-add-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformation .egovuiForm-legal-form-table-box .egovuiForm-trash-can-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformation .egovuiForm-legal-form-table-box .egovuiForm-add-button img+span {
                        padding-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-procedure-outline-wrapper {
                        margin-bottom: 1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-announcement-information-wrapper {
                        margin-bottom: 1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformationDetail #electronicApplicationMethodUsageGuideLinkInformationAndFileName {
                        margin-right: 1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-electronic-application-guide th:nth-child(1) {
                        width: 19% !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-electronic-application-guide th:nth-child(2) {
                        width: 40% !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-electronic-application-guide th:nth-child(3) {
                        width: 41% !important;
                        padding-left: 0.7em !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-electronic-application-guide td:nth-child(3) {
                        padding-left: 0.7rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-submitting-organization-candidate th:nth-child(1) {
                        width: 30% !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-submitting-organization-candidate th:nth-child(2) {
                        width: 35% !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-submitting-organization-candidate th:nth-child(3) {
                        width: 35% !important;
                        padding-left: 1.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #egovuiProcedureInformationDetail .egovuiForm-tb-submitting-organization-candidate td:nth-child(3) {
                        padding-left: 1.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #standardForm .egovuiForm-preview-button img {
                        margin-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #standardForm .egovuiForm-preview-button img+span {
                        padding-left: 0.2rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #legalForm .egovuiForm-preview-button img {
                        margin-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #legalForm .egovuiForm-preview-button img+span {
                        padding-left: 0.2rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #rule .egovuiForm-mapping-information-wrapper h3 {
                        margin-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #screenImage h3 {
                        margin-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-standard-style .egovuiForm-pager .egovuiForm-prev-button:hover::before {
                        bottom: 0.6rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-standard-style .egovuiForm-pager .egovuiForm-prev-button:focus::before {
                        bottom: 0.6rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-standard-style .egovuiForm-pager .egovuiForm-next-button:hover::before {
                        bottom: 0.6rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-standard-style .egovuiForm-pager .egovuiForm-next-button:focus::before {
                        bottom: 0.6rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    #legalFormMaskingButton img {
                        margin-top: 0.1rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-dialog-wrapper {
                        z-index: 400;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-preview-standard-style input[type="text"],
                    .egovuiForm-preview-style textarea {
                        padding-right: 0.7rem !important;
                        padding-left: 0.8rem !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-dialog-wrapper .egovuiForm-dialog {
                        position: relative !important;
                        top: auto !important;
                        right: auto !important;
                        bottom: auto !important;
                        left: auto !important;
                        margin: 0 !important;
                    }

                    _:-ms-lang(x)::backdrop,
                    .egovuiForm-dialog-wrapper .backdrop+.egovuiForm-dialog {
                        position: fixed !important;
                        top: 50% !important;
                        right: 0 !important;
                        bottom: 50% !important;
                        left: 0 !important;
                        margin: auto !important;
                    }

                    body#egovuiMaintenance main {
                        display: flex;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-menu {
                        width: 24rem;
                        min-width: 24rem;
                        background-color: #F5F6F8;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-menu h2 {
                        margin: 0 2rem;
                        padding: 2rem 0 1rem 0;
                        font-size: 1.4rem;
                        font-weight: normal;
                        line-height: 2.1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-menu nav {
                        margin-top: 1.1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-menu nav .egovuiForm-tabs {
                        display: flex;
                        flex-direction: column;
                        height: 100%;
                        margin-left: 0;
                        border-top: none;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-menu nav .egovuiForm-tabs li {
                        position: relative;
                        height: 4rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-menu nav .egovuiForm-tabs li::after {
                        content: none;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-menu nav .egovuiForm-tabs li .egovuiForm-tab-item {
                        display: flex;
                        justify-content: flex-start;
                        padding-left: 2rem;
                        color: #333333;
                        cursor: pointer;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-menu nav .egovuiForm-tabs li .egovuiForm-tab-item.egovuiForm-tab-show {
                        background-color: #FFFFFF;
                        color: #333333;
                        font-weight: bold;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-menu nav .egovuiForm-tabs li .egovuiForm-tab-item.egovuiForm-tab-show::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        height: 4rem;
                        width: 0.4rem;
                        background-color: #1042A4;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-menu nav .egovuiForm-tabs li .egovuiForm-tab-item:hover,
                    body#egovuiMaintenance main .egovuiForm-maintenance-menu nav .egovuiForm-tabs li .egovuiForm-tab-item:focus {
                        background-color: #DFE1E8;
                        text-decoration: underline;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents {
                        width: 100%;
                        min-width: 96rem;
                        padding: 2rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-message-area {
                        line-height: 2.4rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail {
                        padding-top: 0;
                        overflow-x: hidden;
                        overflow-y: hidden;
                        height: 100%;
                        max-height: none;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail>li {
                        display: none;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail>li.egovuiForm-tab-show {
                        display: block;
                        height: 100%;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail>li>div {
                        width: 100%;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail>li>div .egovuiForm-table-wrapper {
                        height: calc(100% - 6.8rem);
                        border: none;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail>li>div .egovuiForm-table-wrapper .egovuiForm-form-table {
                        word-break: break-all;
                        white-space: normal;
                        display: block;
                        height: 100%;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail>li>div .egovuiForm-table-wrapper .egovuiForm-form-table tr {
                        border: none;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail>li>div .egovuiForm-table-wrapper .egovuiForm-form-table td {
                        height: 3.3rem;
                        border-bottom: 0.1rem solid #C6C9D3;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #property>div .egovuiForm-message-area {
                        margin-right: -0.4rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #property>div h4 {
                        margin-top: 6.4rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #property>div .egovuiForm-form-label {
                        min-width: 10.6rem;
                        line-height: 2.4rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #property>div .egovuiForm-form-label-any {
                        min-width: 11.8rem;
                        padding-left: 1.2rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #property>div .egovuiForm-required {
                        display: flex;
                        align-items: center;
                        height: 2.4rem;
                        color: #CA241E;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #property>div .egovuiForm-mt11 {
                        margin-top: 1.1rem !important;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #property>div .egovuiForm-mt16 {
                        margin-top: 1.6rem !important;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #property>div .egovuiForm-lh16 {
                        line-height: 1.6rem !important;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #property>div .egovuiForm-lh24 {
                        line-height: 2.4rem !important;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #property .egovuiForm-maintenance-property-area {
                        width: 44rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div {
                        height: calc(100% - 4rem);
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table thead {
                        display: block;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table thead th {
                        padding: 0;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table thead th:nth-child(1) {
                        width: 20.7rem;
                        min-width: 20.7rem;
                        padding-right: 1rem;
                        padding-left: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table thead th:nth-child(2) {
                        width: 100%;
                        min-width: 8.7rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table thead th:nth-child(3) {
                        width: 10.7rem;
                        min-width: 10.7rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table thead th:nth-child(4) {
                        width: 10.3rem;
                        min-width: 10.3rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table thead th:nth-child(5) {
                        width: 12.5rem;
                        min-width: 12.5rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table thead th:nth-child(6) {
                        width: 8.1rem;
                        min-width: 8.1rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table thead th:nth-child(7) {
                        width: 21rem;
                        min-width: 21rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table tbody {
                        display: block;
                        overflow-x: hidden;
                        overflow-y: scroll;
                        height: calc(100% - 2.4rem);
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table tbody td {
                        padding: 0;
                        line-height: 1.7rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table tbody td:nth-child(1) {
                        width: 20.7rem;
                        min-width: 20.7rem;
                        padding-right: 1rem;
                        padding-left: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table tbody td:nth-child(2) {
                        width: 100%;
                        min-width: 8.7rem;
                        padding-top: 0.3rem;
                        padding-right: 1rem;
                        padding-bottom: 0.2rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table tbody td:nth-child(3) {
                        width: 10.7rem;
                        min-width: 10.7rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table tbody td:nth-child(4) {
                        width: 10.3rem;
                        min-width: 10.3rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table tbody td:nth-child(5) {
                        width: 12.5rem;
                        min-width: 12.5rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table tbody td:nth-child(6) {
                        width: 8.1rem;
                        min-width: 8.1rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #department>div .egovuiForm-form-table tbody td:nth-child(7) {
                        width: 19.3rem;
                        min-width: 19.3rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #organizationType>div {
                        height: calc(100% - 4rem);
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #organizationType>div .egovuiForm-form-table thead {
                        display: block;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #organizationType>div .egovuiForm-form-table th {
                        padding: 0;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #organizationType>div .egovuiForm-form-table th:nth-child(1) {
                        width: 20.7rem;
                        min-width: 20.7rem;
                        padding-right: 1rem;
                        padding-left: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #organizationType>div .egovuiForm-form-table th:nth-child(2) {
                        width: 50%;
                        min-width: 25.4rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #organizationType>div .egovuiForm-form-table th:nth-child(3) {
                        width: 19.7rem;
                        min-width: 19.7rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #organizationType>div .egovuiForm-form-table th:nth-child(4) {
                        width: 50%;
                        min-width: 26.2rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #organizationType>div .egovuiForm-form-table tbody {
                        display: block;
                        overflow-x: hidden;
                        overflow-y: scroll;
                        height: calc(100% - 2.4rem);
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #organizationType>div .egovuiForm-form-table tbody td {
                        padding: 0;
                        line-height: 1.7rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #organizationType>div .egovuiForm-form-table tbody td:nth-child(1) {
                        width: 20.7rem;
                        min-width: 20.7rem;
                        padding-right: 1rem;
                        padding-left: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #organizationType>div .egovuiForm-form-table tbody td:nth-child(2) {
                        width: 50%;
                        min-width: 25.4rem;
                        padding-top: 0.3rem;
                        padding-right: 1rem;
                        padding-bottom: 0.2rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #organizationType>div .egovuiForm-form-table tbody td:nth-child(3) {
                        width: 19.7rem;
                        min-width: 19.7rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #organizationType>div .egovuiForm-form-table tbody td:nth-child(4) {
                        width: 50%;
                        min-width: 24.5rem;
                        padding-top: 0.3rem;
                        padding-bottom: 0.2rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #administrativeFieldClassification>div {
                        height: calc(100% - 4rem);
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #administrativeFieldClassification>div .egovuiForm-form-table thead {
                        display: block;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #administrativeFieldClassification>div .egovuiForm-form-table th {
                        padding: 0;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #administrativeFieldClassification>div .egovuiForm-form-table th:nth-child(1) {
                        width: 12.5rem;
                        min-width: 12.5rem;
                        padding-right: 1rem;
                        padding-left: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #administrativeFieldClassification>div .egovuiForm-form-table th:nth-child(2) {
                        width: 33%;
                        min-width: 26.2rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #administrativeFieldClassification>div .egovuiForm-form-table th:nth-child(3) {
                        width: 33%;
                        min-width: 26.2rem;
                        padding-right: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #administrativeFieldClassification>div .egovuiForm-form-table th:nth-child(4) {
                        width: 33%;
                        min-width: 27.1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #administrativeFieldClassification>div .egovuiForm-form-table tbody {
                        display: block;
                        overflow-x: hidden;
                        overflow-y: scroll;
                        height: calc(100% - 2.4rem);
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #administrativeFieldClassification>div .egovuiForm-form-table tbody td {
                        padding: 0;
                        line-height: 1.7rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #administrativeFieldClassification>div .egovuiForm-form-table tbody td:nth-child(1) {
                        width: 12.5rem;
                        min-width: 12.5rem;
                        padding-right: 1rem;
                        padding-left: 1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #administrativeFieldClassification>div .egovuiForm-form-table tbody td:nth-child(2) {
                        width: 33%;
                        min-width: 26.2rem;
                        padding-top: 0.3rem;
                        padding-right: 1rem;
                        padding-bottom: 0.2rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #administrativeFieldClassification>div .egovuiForm-form-table tbody td:nth-child(3) {
                        width: 33%;
                        min-width: 26.2rem;
                        padding-top: 0.3rem;
                        padding-right: 1rem;
                        padding-bottom: 0.2rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #administrativeFieldClassification>div .egovuiForm-form-table tbody td:nth-child(4) {
                        width: 33%;
                        min-width: 25.4rem;
                        padding-top: 0.3rem;
                        padding-bottom: 0.2rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #backupContents>div {
                        width: 40rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #backupContents>div h4 {
                        margin-top: 4.6rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #backupContents>div button {
                        width: 12rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #backupContents>div .egovuiForm-mt11 {
                        margin-top: 1.1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #backupContents>div .egovuiForm-mt21 {
                        margin-top: 2.1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #backupContents>div .egovuiForm-lh16 {
                        line-height: 1.6rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #importProcedureFileContents>div {
                        width: 69rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #importProcedureFileContents>div .egovuiForm-form-label {
                        min-width: 8.2rem;
                        line-height: 2.4rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #importProcedureFileContents>div .egovuiForm-reference-item-wrapper {
                        width: 100%;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #importProcedureFileContents>div .egovuiForm-submit-button {
                        width: 12rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #importProcedureFileContents>div .egovuiForm-mt21 {
                        margin-top: 2.1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #importProcedureFileContents>div .egovuiForm-warning-description {
                        padding: 0.8rem 0 0.8rem 0.9rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail #importProcedureFileContents>div .egovuiForm-warning-description .egovuiForm-item-warning-icon {
                        margin-top: 0.1rem;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail .egovuiForm-eyecatch {
                        display: flex;
                        align-items: center;
                        position: relative;
                        margin-bottom: 1.5rem;
                        padding-top: 0.1rem;
                        padding-left: 1.2rem;
                        font-size: 1.4rem;
                        font-weight: bold;
                    }

                    body#egovuiMaintenance main .egovuiForm-maintenance-contents .egovuiForm-tabs-detail .egovuiForm-eyecatch::before {
                        content: "";
                        position: absolute;
                        top: -0.2rem;
                        left: 0;
                        width: 0.4rem;
                        height: 2.6rem;
                        background-color: #1042A4;
                    }

                    body#egovuiMaintenance main .egovuiForm-error-description-wrapper {
                        padding-bottom: 0;
                    }

                    body#egovuiMaintenance main .egovuiForm-required-item-error-description {
                        line-height: 1.5;
                        margin-top: -0.1rem;
                        margin-bottom: 0.3rem;
                    }

                    body#egovuiMaintenance dialog {
                        width: 52rem;
                        min-height: 34.8rem;
                    }

                    body#egovuiMaintenance dialog .egovuiForm-dialog-contents {
                        margin-top: 2rem;
                        max-height: 47.2rem;
                    }

                    body#egovuiMaintenance dialog .egovuiForm-dialog-contents .egovuiForm-error-description-wrapper {
                        padding-top: 0;
                    }

                    body#egovuiMaintenance dialog .egovuiForm-dialog-contents .egovuiForm-file-drop-area {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 8rem;
                        margin-bottom: 1rem;
                        border: 1px solid #C6C9D3;
                        border-radius: 0.3rem;
                    }

                    body#egovuiMaintenance dialog .egovuiForm-dialog-contents .egovuiForm-text-3point-leader {
                        margin-right: 3.7rem;
                    }

                    body#egovuiMaintenance dialog .egovuiForm-dialog-contents .egovuiForm-form-table {
                        margin-top: 1rem;
                    }

                    body#egovuiMaintenance dialog .egovuiForm-dialog-contents .egovuiForm-form-table tr {
                        border-bottom: none;
                    }

                    body#egovuiMaintenance dialog .egovuiForm-dialog-contents .egovuiForm-form-table th {
                        padding-left: 1rem;
                        text-align: left;
                    }

                    body#egovuiMaintenance dialog .egovuiForm-dialog-contents .egovuiForm-form-table td {
                        padding-left: 1rem;
                    }

                    body#egovuiMaintenance dialog#dialogImportProcedureFileConfirmation {
                        min-height: 24rem;
                    }

                    body#egovuiMaintenance dialog#dialogImportProcedureFileConfirmation .egovuiForm-dialog-contents {
                        margin-top: 1.6rem;
                        margin-bottom: 4rem;
                        max-height: 47.6rem;
                    }

                    body#egovuiMaintenance dialog#dialogImportProcedureFileConfirmation .egovuiForm-dialog-contents .egovuiForm-dialog-description {
                        line-height: 1.7rem;
                    }

                    body#egovuiMaintenance dialog#dialogImportProcedureFileConfirmation .egovuiForm-dialog-contents .egovuiForm-warning-description {
                        padding: 0.8rem 1rem;
                    }

                    body#egovuiMaintenance dialog#dialogImportProcedureFileConfirmation .egovuiForm-dialog-contents .egovuiForm-warning-description .egovuiForm-item-warning-icon {
                        margin-top: 0.1rem;
                    }

                    body.egovuiForm-dialog-open {
                        pointer-events: none;
                    }

                    ul {
                        list-style: none;
                    }

                    * {
                        box-sizing: border-box;
                    }

                    a[href] {
                        text-decoration: none;
                    }

                    a[href]:focus {
                        outline: none;
                    }

                    button {
                        padding: 0.1rem 0.6rem;
                        cursor: pointer;
                        outline: 0;
                        border: 0;
                        background-color: transparent;
                        font-family: 'Meiryo', sans-serif;
                    }

                    button:disabled {
                        text-decoration: none !important;
                        cursor: default !important;
                    }

                    .egovuiForm-font-size-s {
                        font-size: 1.1rem !important;
                    }

                    .egovuiForm-font-size-m {
                        font-size: 1.2rem !important;
                    }

                    .egovuiForm-font-size-l {
                        font-size: 1.4rem !important;
                    }

                    .egovuiForm-font-normal {
                        font-weight: normal !important;
                    }

                    .egovuiForm-font-bold {
                        font-weight: bold !important;
                    }

                    .egovuiForm-inline-flex-box-column {
                        display: inline-flex !important;
                        flex-direction: column !important;
                    }

                    .egovuiForm-inline-flex-box-row {
                        display: inline-flex !important;
                        flex-direction: row !important;
                    }

                    .egovuiForm-flex-box-column {
                        display: flex !important;
                        flex-direction: column !important;
                    }

                    .egovuiForm-flex-box-row {
                        display: flex !important;
                        flex-direction: row !important;
                    }

                    .egovuiForm-flex-box-row-center {
                        display: flex !important;
                        flex-direction: row !important;
                        align-items: center !important;
                    }

                    .egovuiForm-justify-content-center {
                        justify-content: center !important;
                    }

                    .egovuiForm-flex-stretch {
                        flex-grow: 1 !important;
                    }

                    .egovuiForm-align-items-start {
                        align-items: flex-start !important;
                    }

                    .egovuiForm-align-items-end {
                        align-items: flex-end !important;
                    }

                    .egovuiForm-align-self-end {
                        align-self: flex-end !important;
                    }

                    .egovuiForm-align-self-center {
                        -ms-grid-row-align: center !important;
                        align-self: center !important;
                    }

                    .egovuiForm-justify-content-end {
                        justify-content: flex-end !important;
                    }

                    .egovuiForm-flex-wrap {
                        flex-wrap: wrap !important;
                    }

                    .egovuiForm-pt-none {
                        padding-top: 0 !important;
                    }

                    .egovuiForm-pt-s {
                        padding-top: 1rem !important;
                    }

                    .egovuiForm-pr-s {
                        padding-right: 1rem !important;
                    }

                    .egovuiForm-pr-none {
                        padding-right: 0 !important;
                    }

                    .egovuiForm-pb-s {
                        padding-bottom: 1rem !important;
                    }

                    .egovuiForm-pb-none {
                        padding-bottom: 0 !important;
                    }

                    .egovuiForm-ml-none {
                        margin-left: 0 !important;
                    }

                    .egovuiForm-mt-none {
                        margin-top: 0 !important;
                    }

                    .egovuiForm-mr-none {
                        margin-right: 0 !important;
                    }

                    .egovuiForm-mb-none {
                        margin-bottom: 0 !important;
                    }

                    .egovuiForm-p-none {
                        padding: 0 !important;
                    }

                    .egovuiForm-pl-none {
                        padding-left: 0 !important;
                    }

                    .egovuiForm-pl-s {
                        padding-left: 1rem !important;
                    }

                    .egovuiForm-pl-m {
                        padding-left: 2rem !important;
                    }

                    .egovuiForm-pl-ls {
                        padding-left: 2.4rem !important;
                    }

                    .egovuiForm-ml-auto {
                        margin-left: auto !important;
                    }

                    .egovuiForm-mr-auto {
                        margin-right: auto !important;
                    }

                    .egovuiForm-mt-auto {
                        margin-top: auto !important;
                    }

                    .egovuiForm-mb-auto {
                        margin-bottom: auto !important;
                    }

                    .egovuiForm-mt37 {
                        margin-top: 3.7rem !important;
                    }

                    .egovuiForm-mt39 {
                        margin-top: 3.9rem !important;
                    }

                    .egovuiForm-mt-ll {
                        margin-top: 4rem !important;
                    }

                    .egovuiForm-mt41 {
                        margin-top: 4.1rem !important;
                    }

                    .egovuiForm-mt-m {
                        margin-top: 2rem !important;
                    }

                    .egovuiForm-mt-ms {
                        margin-top: 1.5rem !important;
                    }

                    .egovuiForm-mt-s {
                        margin-top: 1rem !important;
                    }

                    .egovuiForm-mt-xs {
                        margin-top: 0.5rem !important;
                    }

                    .egovuiForm-mt1 {
                        margin-top: 0.1rem !important;
                    }

                    .egovuiForm-mt2 {
                        margin-top: 0.2rem !important;
                    }

                    .egovuiForm-mt3 {
                        margin-top: 0.3rem !important;
                    }

                    .egovuiForm-mr-xs {
                        margin-right: 0.5rem !important;
                    }

                    .egovuiForm-mr-s {
                        margin-right: 1rem !important;
                    }

                    .egovuiForm-mr-12 {
                        margin-right: 1.2rem !important;
                    }

                    .egovuiForm-mr-21 {
                        margin-right: 2.1rem !important;
                    }

                    .egovuiForm-mr-m {
                        margin-right: 2rem !important;
                    }

                    .egovuiForm-mt-ls {
                        margin-top: 3.2rem !important;
                    }

                    .egovuiForm-mt-l {
                        margin-top: 3.6rem !important;
                    }

                    .egovuiForm-ml-xs {
                        margin-left: 0.5rem !important;
                    }

                    .egovuiForm-ml-s {
                        margin-left: 1rem !important;
                    }

                    .egovuiForm-ml-m {
                        margin-left: 2rem !important;
                    }

                    .egovuiForm-ml-ls {
                        margin-left: 3.2rem !important;
                    }

                    .egovuiForm-ml-l {
                        margin-left: 3.6rem !important;
                    }

                    .egovuiForm-mb-xs {
                        margin-bottom: 0.5rem !important;
                    }

                    .egovuiForm-mb-s {
                        margin-bottom: 1rem !important;
                    }

                    .egovuiForm-mb-ms {
                        margin-bottom: 1.5rem !important;
                    }

                    .egovuiForm-mb-m {
                        margin-bottom: 2rem !important;
                    }

                    .egovuiForm-mb-ls {
                        margin-bottom: 3.2rem !important;
                    }

                    .egovuiForm-mb-l {
                        margin-bottom: 3.6rem !important;
                    }

                    .egovuiForm-lh18 {
                        line-height: 1.8rem !important;
                    }

                    .egovuiForm-scroll-x {
                        overflow-x: auto !important;
                    }

                    .egovuiForm-scroll-y {
                        height: 100% !important;
                        overflow-y: auto !important;
                    }

                    .egovuiForm-table-scroll-hidden {
                        height: auto !important;
                        overflow-y: hidden !important;
                    }

                    .egovuiForm-text-right {
                        text-align: right !important;
                    }

                    .egovuiForm-text-left {
                        text-align: left !important;
                    }

                    .egovuiForm-text-center {
                        text-align: center !important;
                    }

                    .egovuiForm-disabled-style {
                        opacity: 0.4 !important;
                        cursor: default !important;
                        pointer-events: none;
                    }

                    .egovuiForm-disabled-style .egovuiForm-label {
                        cursor: default !important;
                    }

                    .egovuiForm-disabled-style .egovuiForm-label::before {
                        cursor: default !important;
                    }

                    .egovuiForm-disabled-style input[type="radio"]:checked~.egovuiForm-label::after {
                        cursor: default !important;
                    }

                    .egovuiForm-toast-notification {
                        display: flex;
                        align-items: center;
                        position: absolute;
                        top: 0;
                        left: 50%;
                        transform: translate(-50%, -4.5rem);
                        height: 4.5rem;
                        width: 40.2rem;
                        padding-left: 2.4rem;
                        border-right: solid 0.1rem #C6C9D3;
                        border-bottom: solid 0.1rem #C6C9D3;
                        border-left: solid 0.1rem #C6C9D3;
                        background-color: #E5EBF5;
                        transition: transform 0.3s ease, visibility 0.1s ease 0.3s;
                        visibility: hidden;
                    }

                    .egovuiForm-toast-notification.egovuiForm-toast-notification-show {
                        transform: translate(-50%, 0);
                        visibility: visible;
                        transition: transform 0.3s ease, visibility 0s ease 0s;
                    }

                    .egovuiForm-toast-notification.egovuiForm-toast-notification-hide {
                        transform: translate(-50%, -4.5rem);
                        visibility: hidden;
                        transition: transform 0s ease 0s, visibility 0s ease 0s;
                    }

                    .egovuiForm-toast-notification .egovuiForm-toast-close-button {
                        position: absolute;
                        top: 1rem;
                        right: 0.8rem;
                        height: 2.4rem;
                        width: 2.4rem;
                        cursor: pointer;
                    }

                    .egovuiForm-toast-notification .egovuiForm-toast-close-button>span {
                        display: inline-block;
                        margin-top: 0.4rem;
                    }

                    .egovuiForm-toast-notification .egovuiForm-toast-close-button:hover,
                    .egovuiForm-toast-notification .egovuiForm-toast-close-button:focus {
                        background-color: #C2CEE7;
                    }

                    .egovuiForm-cursor-resize {
                        cursor: col-resize;
                    }

                    .egovuiForm-display-none {
                        display: none !important;
                    }

                    .egovuiForm-display-inline {
                        display: inline !important;
                    }

                    .egovuiForm-display-inline-block {
                        display: inline-block !important;
                    }

                    .egovuiForm-display-block {
                        display: block !important;
                    }

                    .egovuiForm-display-flex {
                        display: flex !important;
                    }

                    .egovuiForm-position-relative {
                        position: relative !important;
                    }

                    .egovuiForm-line-height-none {
                        line-height: 0 !important;
                    }

                    .egovuiForm-line-height-s {
                        line-height: 1.6rem !important;
                    }

                    .egovuiForm-line-height-m {
                        line-height: 2.4rem !important;
                    }

                    .egovuiForm-divider {
                        height: 0.1rem;
                        background-color: #C6C9D3;
                    }

                    .egovuiForm-normal-button {
                        min-width: 8rem;
                        height: 2.4rem;
                        border: 0.1rem solid #1042A4;
                        border-radius: 0.3rem;
                        background: #FFFFFF;
                        font-size: 1.4rem;
                        color: #1042A4;
                        cursor: pointer;
                    }

                    .egovuiForm-normal-button:hover {
                        text-decoration: underline;
                    }

                    .egovuiForm-normal-button.egovuiForm-w48 {
                        min-width: 4.8rem;
                        width: 4.8rem;
                    }

                    .egovuiForm-normal-button.egovuiForm-w80 {
                        min-width: 8rem;
                        width: 8rem;
                    }

                    .egovuiForm-normal-button.egovuiForm-w100 {
                        min-width: 10rem;
                        width: 10rem;
                    }

                    .egovuiForm-normal-button.egovuiForm-w104 {
                        width: 10.4rem;
                        min-width: 10.4rem;
                    }

                    .egovuiForm-normal-button.egovuiForm-w120 {
                        min-width: 12rem;
                        width: 12rem;
                    }

                    .egovuiForm-normal-button.egovuiForm-w144 {
                        min-width: 14.4rem;
                        width: 14.4rem;
                    }

                    .egovuiForm-normal-button.egovuiForm-w240 {
                        min-width: 24rem;
                        width: 24rem;
                    }

                    .egovuiForm-normal-button.egovuiForm-h32 {
                        min-height: 3.2rem;
                        height: 3.2rem;
                    }

                    .egovuiForm-normal-button.egovuiForm-h24 {
                        min-height: 2.4rem;
                        height: 2.4rem;
                    }

                    .egovuiForm-normal-button.egovuiForm-h20 {
                        min-height: 2rem;
                        height: 2rem;
                    }

                    .egovuiForm-normal-button.egovuiForm-lh1 {
                        line-height: 1;
                    }

                    .egovuiForm-normal-button:focus {
                        outline: none;
                        text-decoration: underline;
                    }

                    .egovuiForm-submit-button {
                        min-width: 8rem;
                        height: 2.4rem;
                        border: 0;
                        outline: 0;
                        border-radius: 0.3rem;
                        background-color: #1042A4;
                        font-size: 1.4rem;
                        color: #FFFFFF;
                        cursor: pointer;
                    }

                    .egovuiForm-submit-button:hover {
                        text-decoration: underline;
                    }

                    .egovuiForm-submit-button.egovuiForm-w48 {
                        min-width: 4.8rem;
                        width: 4.8rem;
                    }

                    .egovuiForm-submit-button.egovuiForm-w80 {
                        min-width: 8rem;
                        width: 8rem;
                    }

                    .egovuiForm-submit-button.egovuiForm-w100 {
                        min-width: 10rem;
                        width: 10rem;
                    }

                    .egovuiForm-submit-button.egovuiForm-w104 {
                        width: 10.4rem;
                        min-width: 10.4rem;
                    }

                    .egovuiForm-submit-button.egovuiForm-w120 {
                        min-width: 12rem;
                        width: 12rem;
                    }

                    .egovuiForm-submit-button.egovuiForm-w144 {
                        min-width: 14.4rem;
                        width: 14.4rem;
                    }

                    .egovuiForm-submit-button.egovuiForm-w240 {
                        min-width: 24rem;
                        width: 24rem;
                    }

                    .egovuiForm-submit-button.egovuiForm-h32 {
                        min-height: 3.2rem;
                        height: 3.2rem;
                    }

                    .egovuiForm-submit-button.egovuiForm-h24 {
                        min-height: 2.4rem;
                        height: 2.4rem;
                    }

                    .egovuiForm-submit-button.egovuiForm-h20 {
                        min-height: 2rem;
                        height: 2rem;
                    }

                    .egovuiForm-submit-button.egovuiForm-lh1 {
                        line-height: 1;
                    }

                    .egovuiForm-submit-button:focus {
                        outline: none;
                        text-decoration: underline;
                    }

                    .egovuiForm-cancel-button {
                        min-width: 8rem;
                        height: 2.4rem;
                        border: 0;
                        outline: 0;
                        border-radius: 0.3rem;
                        background-color: #D7D7D7;
                        font-size: 1.4rem;
                        color: #333333;
                        cursor: pointer;
                    }

                    .egovuiForm-cancel-button:hover {
                        text-decoration: underline;
                    }

                    .egovuiForm-cancel-button.egovuiForm-w48 {
                        min-width: 4.8rem;
                        width: 4.8rem;
                    }

                    .egovuiForm-cancel-button.egovuiForm-w80 {
                        min-width: 8rem;
                        width: 8rem;
                    }

                    .egovuiForm-cancel-button.egovuiForm-w100 {
                        min-width: 10rem;
                        width: 10rem;
                    }

                    .egovuiForm-cancel-button.egovuiForm-w104 {
                        width: 10.4rem;
                        min-width: 10.4rem;
                    }

                    .egovuiForm-cancel-button.egovuiForm-w120 {
                        min-width: 12rem;
                        width: 12rem;
                    }

                    .egovuiForm-cancel-button.egovuiForm-w144 {
                        min-width: 14.4rem;
                        width: 14.4rem;
                    }

                    .egovuiForm-cancel-button.egovuiForm-w240 {
                        min-width: 24rem;
                        width: 24rem;
                    }

                    .egovuiForm-cancel-button.egovuiForm-h32 {
                        min-height: 3.2rem;
                        height: 3.2rem;
                    }

                    .egovuiForm-cancel-button.egovuiForm-h24 {
                        min-height: 2.4rem;
                        height: 2.4rem;
                    }

                    .egovuiForm-cancel-button.egovuiForm-h20 {
                        min-height: 2rem;
                        height: 2rem;
                    }

                    .egovuiForm-cancel-button.egovuiForm-lh1 {
                        line-height: 1;
                    }

                    .egovuiForm-cancel-button:focus {
                        outline: none;
                        text-decoration: underline;
                    }

                    .egovuiForm-ok-button {
                        min-width: 8rem;
                        height: 2.4rem;
                        border: 0;
                        outline: 0;
                        border-radius: 0.3rem;
                        background-color: #1042A4;
                        font-size: 1.4rem;
                        color: #FFFFFF;
                        cursor: pointer;
                    }

                    .egovuiForm-ok-button:hover {
                        text-decoration: underline;
                    }

                    .egovuiForm-ok-button.egovuiForm-w48 {
                        min-width: 4.8rem;
                        width: 4.8rem;
                    }

                    .egovuiForm-ok-button.egovuiForm-w80 {
                        min-width: 8rem;
                        width: 8rem;
                    }

                    .egovuiForm-ok-button.egovuiForm-w100 {
                        min-width: 10rem;
                        width: 10rem;
                    }

                    .egovuiForm-ok-button.egovuiForm-w104 {
                        width: 10.4rem;
                        min-width: 10.4rem;
                    }

                    .egovuiForm-ok-button.egovuiForm-w120 {
                        min-width: 12rem;
                        width: 12rem;
                    }

                    .egovuiForm-ok-button.egovuiForm-w144 {
                        min-width: 14.4rem;
                        width: 14.4rem;
                    }

                    .egovuiForm-ok-button.egovuiForm-w240 {
                        min-width: 24rem;
                        width: 24rem;
                    }

                    .egovuiForm-ok-button.egovuiForm-h32 {
                        min-height: 3.2rem;
                        height: 3.2rem;
                    }

                    .egovuiForm-ok-button.egovuiForm-h24 {
                        min-height: 2.4rem;
                        height: 2.4rem;
                    }

                    .egovuiForm-ok-button.egovuiForm-h20 {
                        min-height: 2rem;
                        height: 2rem;
                    }

                    .egovuiForm-ok-button.egovuiForm-lh1 {
                        line-height: 1;
                    }

                    .egovuiForm-ok-button:focus {
                        outline: none;
                        text-decoration: underline;
                    }

                    .egovuiForm-close-button {
                        width: 3.2rem;
                        height: 3.2rem;
                        padding: 0;
                    }

                    .egovuiForm-close-button>span {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .egovuiForm-close-button:hover,
                    .egovuiForm-close-button:focus {
                        background-color: #E5EBF5;
                    }

                    .egovuiForm-text-button {
                        padding: 0.5rem;
                        color: #1042A4;
                    }

                    .egovuiForm-text-button:hover {
                        text-decoration: underline;
                    }

                    .egovuiForm-reference-item-wrapper {
                        position: relative;
                    }

                    .egovuiForm-reference-item-wrapper .egovuiForm-reference-input {
                        padding-right: 7.2rem;
                        border-top-right-radius: 0.3rem;
                        border-bottom-right-radius: 0.3rem;
                    }

                    .egovuiForm-reference-item-wrapper .egovuiForm-input-file-delete-button {
                        position: absolute;
                        top: 0.4rem;
                        right: 5.2rem;
                        width: 1.6rem;
                        height: 1.6rem;
                        padding: 0;
                        background-image: url("../img/icon-input-file-delete.svg");
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 1rem 1rem;
                    }

                    .egovuiForm-reference-item-wrapper .egovuiForm-input-file-delete-button:hover,
                    .egovuiForm-reference-item-wrapper .egovuiForm-input-file-delete-button:focus {
                        background-color: #DFE1E8;
                        background-image: url("../img/icon-input-file-delete-hover.svg");
                    }

                    .egovuiForm-reference-item-wrapper .egovuiForm-reference-button {
                        position: absolute;
                        top: 0.1rem;
                        right: 0.1rem;
                        width: 4.7rem;
                        min-width: 4.7rem;
                        height: 2.2rem;
                        border: none;
                        border-top-right-radius: 0.3rem;
                        border-bottom-right-radius: 0.3rem;
                        background: #D7D7D7;
                        font-size: 1.2rem;
                        color: #1042A4;
                        cursor: pointer;
                    }

                    .egovuiForm-reference-item-wrapper .egovuiForm-reference-button:hover {
                        text-decoration: underline;
                    }

                    .egovuiForm-reference-item-wrapper .egovuiForm-reference-button:disabled {
                        text-decoration: none !important;
                        cursor: default;
                    }

                    .egovuiForm-reference-item-wrapper .egovuiForm-reference-button:focus {
                        outline: none;
                        text-decoration: underline;
                    }

                    .egovuiForm-link {
                        cursor: pointer;
                        text-decoration: none;
                        color: #1042A4;
                    }

                    .egovuiForm-link:hover {
                        text-decoration: underline;
                    }

                    .egovuiForm-preview-style input[type="text"],
                    .egovuiForm-preview-style input[type="tel"],
                    .egovuiForm-preview-style input[type="url"],
                    .egovuiForm-preview-style input[type="email"],
                    .egovuiForm-preview-style input[type="datetime"],
                    .egovuiForm-preview-style input[type="date"] {
                        -webkit-appearance: none;
                        -moz-appearance: none;
                        appearance: none;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        height: 2.4rem;
                        background-color: #FFFFFF;
                        border: solid 0.1rem #E5EBF5;
                        border-radius: 0.3rem;
                    }

                    .egovuiForm-preview-style input[type="text"]:focus,
                    .egovuiForm-preview-style input[type="tel"]:focus,
                    .egovuiForm-preview-style input[type="url"]:focus,
                    .egovuiForm-preview-style input[type="email"]:focus,
                    .egovuiForm-preview-style input[type="datetime"]:focus,
                    .egovuiForm-preview-style input[type="date"]:focus {
                        outline: 0;
                    }

                    .egovuiForm-preview-style input[type="text"]::-webkit-input-placeholder,
                    .egovuiForm-preview-style input[type="tel"]::-webkit-input-placeholder,
                    .egovuiForm-preview-style input[type="url"]::-webkit-input-placeholder,
                    .egovuiForm-preview-style input[type="email"]::-webkit-input-placeholder,
                    .egovuiForm-preview-style input[type="datetime"]::-webkit-input-placeholder,
                    .egovuiForm-preview-style input[type="date"]::-webkit-input-placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style input[type="text"]::-moz-placeholder,
                    .egovuiForm-preview-style input[type="tel"]::-moz-placeholder,
                    .egovuiForm-preview-style input[type="url"]::-moz-placeholder,
                    .egovuiForm-preview-style input[type="email"]::-moz-placeholder,
                    .egovuiForm-preview-style input[type="datetime"]::-moz-placeholder,
                    .egovuiForm-preview-style input[type="date"]::-moz-placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style input[type="text"]:-ms-input-placeholder,
                    .egovuiForm-preview-style input[type="tel"]:-ms-input-placeholder,
                    .egovuiForm-preview-style input[type="url"]:-ms-input-placeholder,
                    .egovuiForm-preview-style input[type="email"]:-ms-input-placeholder,
                    .egovuiForm-preview-style input[type="datetime"]:-ms-input-placeholder,
                    .egovuiForm-preview-style input[type="date"]:-ms-input-placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style input[type="text"]::-ms-input-placeholder,
                    .egovuiForm-preview-style input[type="tel"]::-ms-input-placeholder,
                    .egovuiForm-preview-style input[type="url"]::-ms-input-placeholder,
                    .egovuiForm-preview-style input[type="email"]::-ms-input-placeholder,
                    .egovuiForm-preview-style input[type="datetime"]::-ms-input-placeholder,
                    .egovuiForm-preview-style input[type="date"]::-ms-input-placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style input[type="text"]::placeholder,
                    .egovuiForm-preview-style input[type="tel"]::placeholder,
                    .egovuiForm-preview-style input[type="url"]::placeholder,
                    .egovuiForm-preview-style input[type="email"]::placeholder,
                    .egovuiForm-preview-style input[type="datetime"]::placeholder,
                    .egovuiForm-preview-style input[type="date"]::placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style input[type="text"][readonly],
                    .egovuiForm-preview-style input[type="tel"][readonly],
                    .egovuiForm-preview-style input[type="url"][readonly],
                    .egovuiForm-preview-style input[type="email"][readonly],
                    .egovuiForm-preview-style input[type="datetime"][readonly],
                    .egovuiForm-preview-style input[type="date"][readonly] {
                        border-color: #D7D7D7;
                        background: transparent;
                    }

                    .egovuiForm-preview-style input[type="text"].egovuiForm-input-error,
                    .egovuiForm-preview-style input[type="tel"].egovuiForm-input-error,
                    .egovuiForm-preview-style input[type="url"].egovuiForm-input-error,
                    .egovuiForm-preview-style input[type="email"].egovuiForm-input-error,
                    .egovuiForm-preview-style input[type="datetime"].egovuiForm-input-error,
                    .egovuiForm-preview-style input[type="date"].egovuiForm-input-error {
                        background-color: #FFEBEB;
                        border: 1px solid #EED4D4;
                    }

                    .egovuiForm-preview-style input[type="text"].egovuiForm-input-error:focus,
                    .egovuiForm-preview-style input[type="tel"].egovuiForm-input-error:focus,
                    .egovuiForm-preview-style input[type="url"].egovuiForm-input-error:focus,
                    .egovuiForm-preview-style input[type="email"].egovuiForm-input-error:focus,
                    .egovuiForm-preview-style input[type="datetime"].egovuiForm-input-error:focus,
                    .egovuiForm-preview-style input[type="date"].egovuiForm-input-error:focus {
                        outline: 0;
                        border: 0.1rem solid #CA241E !important;
                        border-radius: 0.3rem;
                    }

                    .egovuiForm-preview-style input[type="text"].egovuiForm-w168,
                    .egovuiForm-preview-style input[type="tel"].egovuiForm-w168,
                    .egovuiForm-preview-style input[type="url"].egovuiForm-w168,
                    .egovuiForm-preview-style input[type="email"].egovuiForm-w168,
                    .egovuiForm-preview-style input[type="datetime"].egovuiForm-w168,
                    .egovuiForm-preview-style input[type="date"].egovuiForm-w168 {
                        width: 16.8rem;
                        min-width: 16.8rem;
                    }

                    .egovuiForm-preview-style input[type="text"] {
                        width: 100%;
                        height: 2.4rem;
                        padding: 0.2rem 0.9rem;
                        border: 0.1rem solid #C6C9D3;
                        border-radius: 0.3rem;
                        background-color: #FFFFFF;
                        font-size: 1.2rem;
                        font-family: inherit;
                    }

                    .egovuiForm-preview-style input[type="text"].egovuiForm-w36 {
                        width: 3.6rem;
                    }

                    .egovuiForm-preview-style input[type="text"].egovuiForm-w48 {
                        width: 4.8rem;
                    }

                    .egovuiForm-preview-style input[type="text"].egovuiForm-w56 {
                        width: 5.6rem;
                    }

                    .egovuiForm-preview-style input[type="text"].egovuiForm-w80 {
                        width: 8rem;
                    }

                    .egovuiForm-preview-style input[type="text"].egovuiForm-w208 {
                        width: 20.8rem;
                    }

                    .egovuiForm-preview-style input[type="text"].egovuiForm-w240 {
                        width: 24rem;
                    }

                    .egovuiForm-preview-style input[type="text"].egovuiForm-w314 {
                        width: 31.4rem;
                    }

                    .egovuiForm-preview-style input[type="text"].egovuiForm-w322 {
                        width: 32.2rem;
                    }

                    .egovuiForm-preview-style input[type="text"].egovuiForm-w398 {
                        width: 39.8rem;
                    }

                    .egovuiForm-preview-style textarea {
                        width: 100%;
                        min-height: 4.8rem;
                        resize: none;
                        padding: 0.4rem 0.9rem;
                        border: 0.1rem solid #C6C9D3;
                        border-radius: 0.3rem;
                        background-color: #FFFFFF;
                        color: inherit;
                        font-size: 1.2rem;
                        font-family: inherit;
                    }

                    .egovuiForm-preview-style textarea:focus {
                        outline: 0;
                        border: 0.1rem solid #1042A4 !important;
                        border-radius: 0.3rem;
                    }

                    .egovuiForm-preview-style textarea::-webkit-input-placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style textarea::-moz-placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style textarea:-ms-input-placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style textarea::-ms-input-placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style textarea::placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style textarea[readonly] {
                        border-color: #D7D7D7;
                        background: transparent;
                    }

                    .egovuiForm-text-3point-leader {
                        overflow: hidden;
                        text-overflow: ellipsis;
                        white-space: nowrap;
                    }

                    .egovuiForm-calendar-item-wrapper {
                        display: block;
                        position: relative;
                        width: 12.2rem;
                    }

                    .egovuiForm-calendar-item-wrapper input {
                        width: 100%;
                        padding-right: 2.8rem;
                        background-color: #FFFFFF;
                    }

                    .egovuiForm-calendar-item-wrapper button.ui-datepicker-trigger {
                        position: absolute;
                        top: 0.1rem;
                        right: 0.1rem;
                        height: 2.2rem;
                        width: 2.6rem;
                        background-image: url("../img/icon-calendar.svg");
                        background-repeat: no-repeat;
                        background-position: right 0.5rem center;
                        background-size: 1.6rem 1.6rem;
                    }

                    .egovuiForm-calendar-item-wrapper button.ui-datepicker-trigger:hover,
                    .egovuiForm-calendar-item-wrapper button.ui-datepicker-trigger:focus {
                        background-color: #DFE1E8;
                        border-top-right-radius: 0.3rem;
                        border-bottom-right-radius: 0.3rem;
                    }

                    .egovuiForm-calendar-item-wrapper button.ui-datepicker-trigger:disabled {
                        text-decoration: none !important;
                        cursor: default;
                        background-color: #FFFFFF;
                    }

                    .egovuiForm-between-calendar {
                        margin: 0 4px;
                    }

                    .egovuiForm-preview-style input[type="range"] {
                        -moz-appearance: none;
                        appearance: none;
                        -webkit-appearance: none;
                        height: 1.4rem;
                        width: 9.6rem;
                        margin: -0.1rem 0.1rem 0 0.1rem;
                        background-color: transparent;
                        cursor: pointer;
                    }

                    .egovuiForm-preview-style input[type="range"]::-webkit-slider-runnable-track {
                        height: 0.1rem;
                        width: 100%;
                        background: #9E9E9E;
                        cursor: pointer;
                    }

                    .egovuiForm-preview-style input[type="range"]::-webkit-slider-thumb {
                        -webkit-appearance: none;
                        appearance: none;
                        height: 1.4rem;
                        width: 0.6rem;
                        margin-top: -0.6rem;
                        background-color: #FFFFFF;
                        border: 0.1rem solid #1042A4;
                        cursor: pointer;
                    }

                    .egovuiForm-preview-style input[type="range"]:hover,
                    .egovuiForm-preview-style input[type="range"]:focus {
                        outline: none;
                    }

                    .egovuiForm-preview-style input[type="range"]:hover::-webkit-slider-thumb,
                    .egovuiForm-preview-style input[type="range"]:focus::-webkit-slider-thumb {
                        background-color: #DFE1E8;
                    }

                    .egovuiForm-range-wrapper {
                        display: flex;
                        align-items: center;
                    }

                    .egovuiForm-range-wrapper button {
                        height: 1.6rem;
                        width: 1.6rem;
                        padding: 0;
                        color: #1042A4;
                        font-weight: bold;
                        line-height: 1.6rem;
                    }

                    .egovuiForm-range-wrapper button:hover,
                    .egovuiForm-range-wrapper button:focus {
                        background-color: #DFE1E8;
                    }

                    .egovuiForm-spin-button-wrapper {
                        position: relative;
                    }

                    .egovuiForm-spin-button-wrapper input {
                        width: 9.6rem;
                        padding: 0.2rem 3.4rem 0.2rem 0.7rem;
                    }

                    .egovuiForm-spin-button-wrapper button {
                        position: absolute;
                        right: 0.1rem;
                        height: 1.1rem;
                        width: 2.7rem;
                        padding: 0;
                        background-color: #D7D7D7;
                        background-repeat: no-repeat;
                        background-size: 0.8rem 0.5rem;
                    }

                    .egovuiForm-spin-button-wrapper button:hover,
                    .egovuiForm-spin-button-wrapper button:focus {
                        background-color: #B8B8B8;
                    }

                    .egovuiForm-spin-button-wrapper button.egovuiForm-number-up-button {
                        top: 0.1rem;
                        background-image: url("../img/icon-spin-button-up.svg");
                        background-position: center top 0.2rem;
                        border-top-right-radius: 0.2rem;
                    }

                    .egovuiForm-spin-button-wrapper button.egovuiForm-number-down-button {
                        bottom: 0.1rem;
                        background-image: url("../img/icon-spin-button-down.svg");
                        background-position: center bottom 0.2rem;
                        border-bottom-right-radius: 0.2rem;
                    }

                    .egovuiForm-table-wrapper {
                        border: 0.1rem solid #C6C9D3;
                        flex: 1;
                        background-color: #FFFFFF;
                    }

                    .egovuiForm-table,
                    .egovuiForm-dialog-table {
                        white-space: nowrap;
                    }

                    .egovuiForm-table thead th,
                    .egovuiForm-dialog-table thead th {
                        position: relative;
                        height: 2.5rem;
                        line-height: 1.8rem;
                        padding: 0;
                        background-color: #E5EBF5;
                        border-bottom: 1px solid #C6C9D3;
                        text-align: left;
                        font-weight: normal;
                    }

                    .egovuiForm-table thead th .egovuiForm-sort-descending,
                    .egovuiForm-dialog-table thead th .egovuiForm-sort-descending {
                        position: absolute;
                        top: 1rem;
                        right: 0.5rem;
                    }

                    .egovuiForm-table thead th .egovuiForm-sort-ascending,
                    .egovuiForm-dialog-table thead th .egovuiForm-sort-ascending {
                        position: absolute;
                        top: 1rem;
                        right: 0.5rem;
                    }

                    .egovuiForm-table thead th .egovuiForm-table-partition,
                    .egovuiForm-dialog-table thead th .egovuiForm-table-partition {
                        height: 1.6rem;
                        width: 0.1rem;
                        min-width: 0.1rem;
                        margin-top: 0.4rem;
                        background-color: #C6C9D3;
                    }

                    .egovuiForm-table thead th span,
                    .egovuiForm-dialog-table thead th span {
                        display: inline-block;
                        height: 100%;
                        width: 100%;
                        padding: 0.3rem 0.4rem 0.3rem 0.4rem;
                    }

                    .egovuiForm-table thead th span:hover,
                    .egovuiForm-table thead th span:focus,
                    .egovuiForm-dialog-table thead th span:hover,
                    .egovuiForm-dialog-table thead th span:focus {
                        background-color: #C2CEE7;
                        cursor: pointer;
                    }

                    .egovuiForm-table tbody,
                    .egovuiForm-dialog-table tbody {
                        text-align: center;
                    }

                    .egovuiForm-table tbody tr,
                    .egovuiForm-dialog-table tbody tr {
                        cursor: pointer;
                    }

                    .egovuiForm-table tbody td,
                    .egovuiForm-dialog-table tbody td {
                        height: 2.5rem;
                        line-height: 1.8rem;
                        padding: 0.3rem 0 0.3rem 0.4rem;
                        border-bottom: 0.1rem solid #C6C9D3;
                        background-color: #FFFFFF;
                    }

                    .egovuiForm-table tbody td.egovuiForm-td-many-blank-item,
                    .egovuiForm-dialog-table tbody td.egovuiForm-td-many-blank-item {
                        padding-right: 1.7rem !important;
                    }

                    .egovuiForm-table tbody td.egovuiForm-text-3point-leader,
                    .egovuiForm-dialog-table tbody td.egovuiForm-text-3point-leader {
                        max-width: 0;
                    }

                    .egovuiForm-table tbody td div.egovuiForm-text-3point-leader,
                    .egovuiForm-dialog-table tbody td div.egovuiForm-text-3point-leader {
                        max-width: 100%;
                    }

                    .egovuiForm-table tbody td .egovuiForm-radio-wrapper .egovuiForm-label::before,
                    .egovuiForm-dialog-table tbody td .egovuiForm-radio-wrapper .egovuiForm-label::before {
                        top: 0.3rem;
                        left: 0.1rem;
                    }

                    .egovuiForm-table tbody td .egovuiForm-radio-wrapper input[type="radio"]:checked~.egovuiForm-label::after,
                    .egovuiForm-dialog-table tbody td .egovuiForm-radio-wrapper input[type="radio"]:checked~.egovuiForm-label::after {
                        top: 0.7rem;
                        left: 0.5rem;
                    }

                    .egovuiForm-table.egovuiForm-table-header-fixed,
                    .egovuiForm-dialog-table.egovuiForm-table-header-fixed {
                        display: block;
                        table-layout: fixed;
                        height: 100%;
                        width: 100%;
                    }

                    .egovuiForm-table.egovuiForm-table-header-fixed thead,
                    .egovuiForm-dialog-table.egovuiForm-table-header-fixed thead {
                        display: block;
                    }

                    .egovuiForm-table.egovuiForm-table-header-fixed thead tr,
                    .egovuiForm-dialog-table.egovuiForm-table-header-fixed thead tr {
                        display: flex;
                    }

                    .egovuiForm-table.egovuiForm-table-header-fixed thead tr th,
                    .egovuiForm-dialog-table.egovuiForm-table-header-fixed thead tr th {
                        display: flex;
                    }

                    .egovuiForm-table.egovuiForm-table-header-fixed tbody,
                    .egovuiForm-dialog-table.egovuiForm-table-header-fixed tbody {
                        display: block;
                        overflow-x: hidden;
                        overflow-y: scroll;
                        height: calc(100% - 2.4rem);
                    }

                    .egovuiForm-table.egovuiForm-table-header-fixed tbody tr,
                    .egovuiForm-dialog-table.egovuiForm-table-header-fixed tbody tr {
                        display: flex;
                    }

                    .egovuiForm-table.egovuiForm-table-header-fixed tbody tr td,
                    .egovuiForm-dialog-table.egovuiForm-table-header-fixed tbody tr td {
                        display: block;
                        padding-right: 0.4rem;
                        text-align: left;
                    }

                    .egovuiForm-table.egovuiForm-table-header-fixed tbody tr td.egovuiForm-text-3point-leader,
                    .egovuiForm-dialog-table.egovuiForm-table-header-fixed tbody tr td.egovuiForm-text-3point-leader {
                        max-width: 100%;
                    }

                    .egovuiForm-table tbody tr:hover td,
                    .egovuiForm-table tbody tr:focus td {
                        background-color: #E5EBF5;
                        text-decoration: underline;
                    }

                    .egovuiForm-table tbody tr.egovuiForm-selected td {
                        background-color: #1042A4;
                        color: #FFFFFF;
                    }

                    .egovuiForm-table tbody tr.egovuiForm-hide-selected td {
                        background-color: #C2CEE7;
                    }

                    .egovuiForm-dialog-table thead th .egovuiForm-sort-descending {
                        top: 0.9rem;
                        right: 1.1rem;
                    }

                    .egovuiForm-dialog-table thead th .egovuiForm-sort-ascending {
                        top: 0.9rem;
                        right: 1.2rem;
                    }

                    .egovuiForm-dialog-table thead th span:hover,
                    .egovuiForm-dialog-table thead th span:focus {
                        background-color: #E5EBF5;
                    }

                    .egovuiForm-form-table {
                        width: 100%;
                        white-space: nowrap;
                    }

                    .egovuiForm-form-table .egovuiForm-table-td-error {
                        background-color: #FFEBEB;
                    }

                    .egovuiForm-form-table thead th {
                        position: relative;
                        height: 2.4rem;
                        line-height: 2.4rem;
                        padding: 0 1.6rem 0 1rem;
                        background-color: #F5F6F8;
                        text-align: left;
                        font-weight: normal;
                        font-size: 1.2rem;
                    }

                    .egovuiForm-form-table thead th:last-child {
                        width: 3rem;
                        text-align: center;
                    }

                    .egovuiForm-form-table tbody tr {
                        border-bottom: 0.1rem solid #C6C9D3;
                    }

                    .egovuiForm-form-table tbody tr td {
                        height: 3.2rem;
                        line-height: 3.2rem;
                        padding: 0 1rem;
                        vertical-align: middle;
                        background-color: #FFFFFF;
                    }

                    .egovuiForm-form-table tbody tr td.egovuiForm-text-3point-leader {
                        max-width: 0;
                    }

                    .egovuiForm-form-table tbody tr td .egovuiForm-trash-can-button {
                        padding: 0;
                        margin-top: -0.1rem;
                        vertical-align: middle;
                    }

                    .egovuiForm-form-table tbody tr td .egovuiForm-trash-can-button:disabled {
                        text-decoration: none;
                        cursor: default;
                    }

                    .egovuiForm-vertical-table {
                        width: 100%;
                        white-space: nowrap;
                    }

                    .egovuiForm-vertical-table tr {
                        height: 2.5rem;
                        border-top: 0.1rem solid #C6C9D3;
                    }

                    .egovuiForm-vertical-table tr th {
                        padding: 0.3rem 1rem;
                        background-color: #F5F6F8;
                        font-weight: normal;
                        text-align: left;
                        vertical-align: middle;
                    }

                    .egovuiForm-vertical-table tr td {
                        padding: 0.3rem 1rem;
                        text-align: left;
                        vertical-align: middle;
                    }

                    .egovuiForm-vertical-table tr:last-child {
                        border-bottom: 0.1rem solid #C6C9D3;
                    }

                    .egovuiForm-tabs {
                        display: flex;
                        flex-flow: row nowrap;
                        height: 3.2rem;
                        margin-left: 0.2rem;
                        background-color: #F5F6F8;
                        border-top: 1px solid #D7D7D7;
                    }

                    .egovuiForm-tabs li {
                        position: relative;
                        min-width: 16rem;
                    }

                    .egovuiForm-tabs li::after {
                        content: "";
                        position: absolute;
                        top: 0.4rem;
                        right: -0.1rem;
                        width: 0.1rem;
                        height: 2.4rem;
                        background-color: #D7D7D7;
                        z-index: 1;
                    }

                    .egovuiForm-tabs li .egovuiForm-tab-item {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 100%;
                        width: 100%;
                        color: #1043A4;
                        cursor: pointer;
                    }

                    .egovuiForm-tabs li .egovuiForm-tab-item.egovuiForm-tab-show {
                        background-color: #FFFFFF;
                        color: #333333;
                        font-weight: bold;
                    }

                    .egovuiForm-tabs li .egovuiForm-tab-item.egovuiForm-tab-show::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        height: 0.2rem;
                        background-color: #1042A4;
                    }

                    .egovuiForm-tabs li .egovuiForm-tab-item:not(.egovuiForm-tab-show).egovuiForm-tab-error-show {
                        background-color: #FFEBEB;
                    }

                    .egovuiForm-tabs li .egovuiForm-tab-item:hover {
                        text-decoration: underline;
                    }

                    .egovuiForm-tabs li .egovuiForm-tab-item:focus {
                        outline: none;
                        text-decoration: underline;
                    }

                    .egovuiForm-tabs.egovuiForm-small {
                        padding-left: 0;
                    }

                    .egovuiForm-tabs.egovuiForm-small>li::after {
                        content: "";
                        height: 1.6rem;
                    }

                    .egovuiForm-tabs.egovuiForm-small>li:first-child::before {
                        content: none;
                    }

                    .egovuiForm-tabs.egovuiForm-small>li label span {
                        height: 2.4rem;
                    }

                    .egovuiForm-tabs-detail {
                        padding-top: 1rem;
                        overflow-x: hidden;
                        overflow-y: auto;
                        height: 100%;
                        max-height: calc(100% - 7.6rem);
                    }

                    .egovuiForm-tabs-detail>li {
                        display: none;
                    }

                    .egovuiForm-tabs-detail>li.egovuiForm-tab-show {
                        display: block;
                        height: 100%;
                    }

                    .egovuiForm-tabs-detail>li>div {
                        width: 100%;
                    }

                    .egovuiForm-h3 {
                        line-height: 2.1rem;
                        font-size: 1.4rem;
                        font-weight: bold;
                    }

                    .egovuiForm-header {
                        display: flex;
                        height: 3.3rem;
                        align-items: center;
                        border-bottom: 0.1rem solid #CCCFD1;
                    }

                    .egovuiForm-header .egovuiForm-header-menu-button {
                        height: 3.2rem;
                        width: 3.2rem;
                        padding: 0;
                    }

                    .egovuiForm-header .egovuiForm-header-menu-button span {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 100%;
                    }

                    .egovuiForm-header .egovuiForm-header-menu-button:hover,
                    .egovuiForm-header .egovuiForm-header-menu-button:focus {
                        background-color: #E5EBF5;
                    }

                    .egovuiForm-header .egovuiForm-header-menu-button:focus {
                        outline: none;
                        text-decoration: underline;
                    }

                    .egovuiForm-header .egovuiForm-header-logo {
                        margin-left: 1rem;
                    }

                    .egovuiForm-form {
                        padding: 1rem 2rem 2rem 2rem;
                        line-height: 1.5;
                    }

                    .egovuiForm-form .egovuiForm-form-heading {
                        line-height: 2.4rem;
                        font-weight: bold;
                        font-size: 1.4rem;
                    }

                    .egovuiForm-form .egovuiForm-form-label {
                        min-width: 9.6rem;
                        margin-right: 1rem;
                        line-height: 2.4rem;
                        text-align: left;
                    }

                    .egovuiForm-form .egovuiForm-form-label.egovuiForm-label-s {
                        min-width: 6rem;
                    }

                    .egovuiForm-form .egovuiForm-form-label.egovuiForm-label-wrap {
                        line-height: 1.4rem;
                    }

                    .egovuiForm-form .egovuiForm-required {
                        display: flex;
                        align-items: center;
                        height: 2.4rem;
                        color: #CA241E;
                    }

                    .egovuiForm-form .egovuiForm-required.egovuiForm-Multiple-lines {
                        position: relative;
                        top: -0.7rem;
                    }

                    .egovuiForm-form .egovuiForm-required.egovuiForm-Multiple-lines-small {
                        position: relative;
                        top: -0.5rem;
                    }

                    .egovuiForm-form .egovuiForm-required.egovuiForm-Multiple-lines-big {
                        position: relative;
                        top: -0.9rem;
                    }

                    .egovuiForm-form .egovuiForm-flex-box-column>.egovuiForm-form-label {
                        text-align: left;
                        margin-bottom: 0.3rem;
                    }

                    .egovuiForm-form.egovuiForm-vertical select {
                        min-width: 16rem;
                    }

                    .egovuiForm-tree-panel {
                        position: relative;
                    }

                    .egovuiForm-tree-panel::after {
                        content: "";
                        position: absolute;
                        top: 0;
                        right: 0;
                        width: 1rem;
                        height: 100%;
                        background-color: #FFFFFF;
                        z-index: -1;
                    }

                    .egovuiForm-tree-header {
                        display: flex;
                        align-items: center;
                        height: 3.5rem;
                        line-height: 2.4rem;
                        border-bottom: 0.1rem solid #D2D4DC;
                    }

                    .egovuiForm-tree-header>ul {
                        margin-left: auto;
                    }

                    .egovuiForm-tree-header>ul li {
                        position: relative;
                        display: flex;
                        padding: 0 0.8rem;
                    }

                    .egovuiForm-tree-header>ul li:last-child {
                        padding-right: 0;
                    }

                    .egovuiForm-tree-header>ul li:not(:first-child)::after {
                        content: '';
                        position: absolute;
                        top: 0.1rem;
                        left: 0;
                        display: inline-block;
                        width: 0.1rem;
                        height: 1.6rem;
                        background-color: #C6C9D3;
                    }

                    .egovuiForm-tree-header>ul li button {
                        height: 100%;
                        padding: 0;
                    }

                    .egovuiForm-tree-wrapper {
                        overflow-y: auto;
                        height: calc(100% - 6rem);
                    }

                    .egovuiForm-tree {
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                    }

                    .egovuiForm-tree li {
                        position: relative;
                        border: 0;
                        border-color: transparent;
                        border-style: solid;
                    }

                    .egovuiForm-tree li:last-child::after {
                        content: "";
                        position: absolute;
                        display: block;
                        width: 100%;
                        left: 0;
                        bottom: -0.2rem;
                        height: 0.2rem;
                        z-index: -1;
                    }

                    .egovuiForm-tree li:last-child.egovuiForm-parent:not(.egovuiForm-tree-close)::after {
                        width: 1rem;
                    }

                    .egovuiForm-tree li span {
                        position: relative;
                        display: inline-block;
                        width: 100%;
                        height: 2.4rem;
                        padding-left: 3.2rem;
                        padding-right: 1rem;
                        line-height: 2.4rem;
                        font-size: 1.2rem;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        white-space: nowrap;
                    }

                    .egovuiForm-tree li span:hover,
                    .egovuiForm-tree li span:focus {
                        cursor: pointer;
                        text-decoration: underline;
                    }

                    .egovuiForm-tree li span:hover::before,
                    .egovuiForm-tree li span:focus::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        right: 0;
                        z-index: -1;
                        height: 2.4rem;
                        width: 999rem;
                        background-color: #EEEEEE;
                    }

                    .egovuiForm-tree li .egovuiForm-required-item-error-description span {
                        position: relative;
                        display: inline-block;
                        width: 100%;
                    }

                    .egovuiForm-tree li .egovuiForm-required-item-error-description span::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        right: 0;
                        z-index: -1;
                        height: 2.4rem;
                        width: 999rem;
                        background-color: #FFEBEB;
                    }

                    .egovuiForm-tree li.egovuiForm-selected>span {
                        font-weight: bold;
                    }

                    .egovuiForm-tree li.egovuiForm-selected>span::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        right: 0;
                        z-index: -1;
                        height: 2.4rem;
                        width: 999rem;
                        background-color: #D7D7D7;
                    }

                    .egovuiForm-tree li.egovuiForm-selected>div>span {
                        font-weight: bold;
                    }

                    .egovuiForm-tree li.egovuiForm-selected>div>span::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        right: 0;
                        z-index: -1;
                        height: 2.4rem;
                        width: 999rem;
                        background-color: #D7D7D7;
                    }

                    .egovuiForm-tree .egovuiForm-parent:not(.egovuiForm-no-child)::before {
                        content: '';
                        position: absolute;
                        top: 0.2rem;
                        left: 0;
                        padding: 1rem;
                        z-index: 1;
                        background-repeat: no-repeat;
                        background-position: center center;
                        background-image: url("../img/icon-accordion-arrow-bottom.svg");
                        background-size: 1rem 0.7rem;
                        cursor: pointer;
                    }

                    .egovuiForm-tree .egovuiForm-parent.egovuiForm-tree-close ul {
                        display: none;
                    }

                    .egovuiForm-tree .egovuiForm-parent.egovuiForm-tree-close::before {
                        background-image: url("../img/icon-accordion-arrow-right.svg");
                        background-size: 0.7rem 1rem;
                    }

                    .egovuiForm-tree.egovuiForm-tree-root {
                        font-size: 0;
                    }

                    .egovuiForm-tree.egovuiForm-tree-root>.egovuiForm-parent>span {
                        padding-left: 2rem;
                    }

                    .egovuiForm-tree.egovuiForm-tree-root>li:last-child {
                        margin-bottom: 0;
                    }

                    .egovuiForm-tree#standardFormTree.egovuiForm-tree-root {
                        padding-left: 0;
                    }

                    .egovuiForm-tree#standardFormTree .egovuiForm-parent::before {
                        content: none;
                    }

                    .egovuiForm-tree#legal-form-tree.egovuiForm-tree-root {
                        padding-left: 0;
                    }

                    .egovuiForm-tree#legal-form-tree .egovuiForm-parent::before {
                        content: none;
                    }

                    .egovuiForm-tree#legal-form-tree li span {
                        padding-left: 1rem;
                    }

                    .egovuiForm-tree#legal-form-tree li.egovuiForm-unassigned>span {
                        position: relative;
                    }

                    .egovuiForm-tree#legal-form-tree li.egovuiForm-unassigned>span::before {
                        content: url("../img/icon-unassigned.svg");
                        position: absolute;
                        left: 0.3rem;
                        top: 0.9rem;
                    }

                    .egovuiForm-tree .dragstart>span {
                        background-clip: padding-box;
                        border-color: transparent;
                    }

                    .egovuiForm-tree .dragstart>ul {
                        display: none;
                    }

                    .egovuiForm-tree .dragstart::after {
                        display: none !important;
                    }

                    .egovuiForm-tree .drop-insert>span::before {
                        content: "";
                        position: absolute;
                        top: -0.2rem;
                        right: 0;
                        z-index: -1;
                        height: 2.4rem;
                        width: 999rem;
                        background-color: #D7D7D7;
                    }

                    .egovuiForm-tree .drop-before::after {
                        content: "";
                        position: absolute;
                        top: -0.2rem;
                        right: 0;
                        left: auto !important;
                        z-index: -1;
                        height: 0.2rem;
                        width: 999rem !important;
                        background-color: #333333;
                    }

                    .egovuiForm-tree .drop-after::after {
                        content: "";
                        position: absolute;
                        bottom: -0.2rem;
                        right: 0;
                        left: auto !important;
                        z-index: -1;
                        height: 0.2rem;
                        width: 999rem !important;
                        background-color: #333333;
                    }

                    .egovuiForm-icon-and-text-button,
                    .egovuiForm-trash-can-button,
                    .egovuiForm-file-input-button,
                    .egovuiForm-file-output-button,
                    .egovuiForm-add-button,
                    .egovuiForm-masking-button {
                        height: 100%;
                        color: #1042A4;
                        font-size: 1.2rem;
                    }

                    .egovuiForm-icon-and-text-button img,
                    .egovuiForm-trash-can-button img,
                    .egovuiForm-file-input-button img,
                    .egovuiForm-file-output-button img,
                    .egovuiForm-add-button img,
                    .egovuiForm-masking-button img {
                        margin-right: 0.4rem;
                    }

                    .egovuiForm-icon-and-text-button:hover,
                    .egovuiForm-trash-can-button:hover,
                    .egovuiForm-file-input-button:hover,
                    .egovuiForm-file-output-button:hover,
                    .egovuiForm-add-button:hover,
                    .egovuiForm-masking-button:hover {
                        text-decoration: underline;
                    }

                    .egovuiForm-icon-and-text-button:focus,
                    .egovuiForm-trash-can-button:focus,
                    .egovuiForm-file-input-button:focus,
                    .egovuiForm-file-output-button:focus,
                    .egovuiForm-add-button:focus,
                    .egovuiForm-masking-button:focus {
                        outline: none;
                        text-decoration: underline;
                    }

                    .egovuiForm-file-output-button img {
                        margin-top: 0.1rem;
                    }

                    .egovuiForm-new-create-button {
                        height: 1.8rem;
                        color: #1042A4;
                        font-size: 1.2rem;
                    }

                    .egovuiForm-new-create-button img {
                        margin-right: 0.6rem;
                    }

                    .egovuiForm-new-create-button:hover {
                        text-decoration: underline;
                    }

                    .egovuiForm-new-create-button:focus {
                        outline: none;
                        text-decoration: underline;
                    }

                    .egovuiForm-preview-button span span {
                        padding-left: 0.3rem;
                    }

                    .egovuiForm-dialog-wrapper {
                        position: fixed;
                        top: 0;
                        left: 0;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        width: 100%;
                        height: 100%;
                        pointer-events: none;
                    }

                    .egovuiForm-dialog-wrapper .egovuiForm-dialog {
                        pointer-events: auto;
                    }

                    .egovuiForm-dialog-wrapper .egovuiForm-error-description-wrapper {
                        padding-top: 1rem;
                        padding-bottom: 1rem;
                    }

                    .egovuiForm-dialog-wrapper #dialogDiscardEdit {
                        width: 52rem;
                        min-height: 19.8rem;
                    }

                    .egovuiForm-dialog-wrapper #dialogDiscardEdit .egovuiForm-normal-button {
                        font-size: 1.4rem;
                    }

                    .egovuiForm-dialog-wrapper #dialogDiscardEdit .egovuiForm-dialog-contents {
                        margin-top: 1.7rem;
                        max-height: 48rem;
                        padding-bottom: 0.1rem;
                    }

                    .egovuiForm-dialog-wrapper #dialogDiscardEdit .egovuiForm-dialog-contents .egovuiForm-dialog-description {
                        line-height: 1.6rem;
                    }

                    .egovuiForm-dialog-wrapper #dialogErrorAlert {
                        width: 52rem;
                        min-height: 19.8rem;
                    }

                    .egovuiForm-dialog-wrapper #dialogErrorAlert .egovuiForm-dialog-contents {
                        margin-top: 1.7rem;
                        max-height: 48rem;
                        padding-bottom: 0.1rem;
                    }

                    .egovuiForm-dialog-wrapper #dialogErrorAlert .egovuiForm-dialog-contents .egovuiForm-dialog-description {
                        line-height: 1.6rem;
                    }

                    .egovuiForm-dialog {
                        position: fixed;
                        top: 50%;
                        bottom: 50%;
                        min-width: 34rem;
                        max-height: 64rem;
                        border: 0;
                        padding: 3rem 4rem;
                        background-color: #FFFFFF;
                        color: #333333;
                    }

                    .egovuiForm-dialog::-webkit-backdrop {
                        position: fixed;
                        top: 0;
                        right: 0;
                        bottom: 0;
                        left: 0;
                        background: rgba(0, 0, 0, 0.6);
                    }

                    .egovuiForm-dialog::backdrop {
                        position: fixed;
                        top: 0;
                        right: 0;
                        bottom: 0;
                        left: 0;
                        background: rgba(0, 0, 0, 0.6);
                    }

                    .egovuiForm-dialog+.backdrop {
                        background: rgba(0, 0, 0, 0.6);
                    }

                    .egovuiForm-dialog>.egovuiForm-dialog-close-button {
                        position: absolute;
                        top: 0;
                        right: 0;
                        width: 3.2rem;
                        min-width: 3.2rem;
                        height: 3.2rem;
                    }

                    .egovuiForm-dialog>.egovuiForm-dialog-close-button>span {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .egovuiForm-dialog>.egovuiForm-dialog-close-button:hover,
                    .egovuiForm-dialog>.egovuiForm-dialog-close-button:focus {
                        background-color: #E5EBF5;
                    }

                    .egovuiForm-dialog .egovuiForm-dialog-message {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        min-height: 12rem;
                    }

                    .egovuiForm-dialog .egovuiForm-contents-wrapper {
                        height: 100%;
                    }

                    .egovuiForm-dialog .egovuiForm-contents-wrapper .egovuiForm-dialog-contents {
                        margin-top: 1.6rem;
                        overflow-x: hidden;
                        overflow-y: auto;
                    }

                    .egovuiForm-dialog .egovuiForm-contents-wrapper .egovuiForm-dialog-contents .egovuiForm-dialog-description {
                        line-height: 2.4rem;
                    }

                    .egovuiForm-dialog .egovuiForm-contents-wrapper .egovuiForm-horizontal-line {
                        height: 0.1rem;
                        background-color: #C6C9D3;
                    }

                    .egovuiForm-dialog .egovuiForm-contents-wrapper .egovuiForm-dialog-footer button {
                        min-width: 12rem;
                    }

                    .egovuiForm-main {
                        flex: 1;
                        max-height: calc(100% - 3.3rem);
                    }

                    .egovuiForm-nav-menu {
                        position: absolute;
                        top: 0;
                        left: 0;
                        bottom: 0;
                        min-height: 40rem;
                        z-index: 200;
                    }

                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner {
                        display: none;
                        position: relative;
                        z-index: 1;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                        height: 100%;
                    }

                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner #menu {
                        display: flex;
                        flex-direction: column;
                        position: absolute;
                        width: 16rem;
                        height: 100%;
                        top: 0;
                        background: #FFFFFF;
                        box-shadow: 0 0.3rem 0.6rem rgba(0, 0, 0, 0.16);
                        transform-origin: 0% 0%;
                        transform: translate(-100%, 0);
                        transition: transform 0.5s ease;
                    }

                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner #menu ul {
                        flex: 1;
                        padding-top: 1rem;
                    }

                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner #menu ul li {
                        line-height: 4rem;
                    }

                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner #menu ul li a {
                        display: block;
                        width: 100%;
                        color: #333333;
                    }

                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner #menu ul li a:hover,
                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner #menu ul li a:focus {
                        background-color: #ECECEC;
                        text-decoration: underline;
                        cursor: pointer;
                    }

                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner #menu ul li span {
                        padding-left: 2rem;
                    }

                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner #menu .egovuiForm-vertical {
                        -ms-grid-row-align: center;
                        align-self: center;
                        height: 0.1rem;
                        width: 14rem;
                        background-color: #C6C9D3;
                    }

                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner #menu .egovuiForm-nav-menu-end {
                        padding: 1rem 0;
                    }

                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner #menu .egovuiForm-nav-menu-end .egovuiForm-nav-menu-end-link {
                        display: flex;
                        align-items: center;
                        height: 4rem;
                        width: 100%;
                        padding: 0;
                        font-size: 1.2rem;
                        color: #333333;
                    }

                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner #menu .egovuiForm-nav-menu-end .egovuiForm-nav-menu-end-link span {
                        padding-left: 2rem;
                    }

                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner #menu .egovuiForm-nav-menu-end .egovuiForm-nav-menu-end-link:hover,
                    .egovuiForm-nav-menu .egovuiForm-nav-menu-inner #menu .egovuiForm-nav-menu-end .egovuiForm-nav-menu-end-link:focus {
                        background-color: #ECECEC;
                        text-decoration: underline;
                        cursor: pointer;
                    }

                    .egovuiForm-nav-menu.egovuiForm-menu-open #menu {
                        transform: none;
                    }

                    .egovuiForm-footer-button {
                        display: flex;
                        flex-direction: row;
                        align-items: center;
                        flex-shrink: 0;
                        height: 4.5rem;
                        padding: 0 2rem;
                        border-top: 0.1rem solid #D2D4DC;
                    }

                    .egovuiForm-footer-button>button {
                        min-width: 9rem;
                    }

                    .egovuiForm-change-size-bar {
                        position: absolute;
                        top: 0;
                        right: -0.2rem;
                        bottom: 0;
                        width: 0.3rem;
                        cursor: col-resize;
                    }

                    .egovuiForm-change-size-bar::before,
                    .egovuiForm-change-size-bar::after {
                        content: '';
                        position: absolute;
                        display: block;
                        width: 0.3rem;
                        bottom: 0;
                        top: 0;
                    }

                    .ui-widget.ui-widget-content {
                        padding-left: 1.2rem !important;
                        border: none !important;
                        background-color: #F5F6F8;
                    }

                    .ui-datepicker {
                        height: 24.6rem !important;
                        width: 22rem !important;
                        padding: 1.3rem 1.6rem 1rem 1.6rem !important;
                    }

                    .ui-datepicker .ui-datepicker-header {
                        height: 2.9rem !important;
                        padding: 0 !important;
                        padding-left: 0.3rem !important;
                        border: 0 !important;
                        background: none !important;
                    }

                    .ui-datepicker .ui-datepicker-prev {
                        top: -0.1rem !important;
                        left: -0.4rem !important;
                        cursor: pointer !important;
                    }

                    .ui-datepicker .ui-datepicker-prev span {
                        background-position: center !important;
                        background-image: url("../../common/img/icon-calendar-arrow-left.svg") !important;
                        background-size: 1.1rem 1.6rem !important;
                    }

                    .ui-datepicker .ui-datepicker-prev.ui-state-hover,
                    .ui-datepicker .ui-datepicker-prev:focus {
                        border: 0 !important;
                        top: -0.1rem !important;
                        left: -0.4rem !important;
                        background-color: transparent !important;
                        outline: none !important;
                    }

                    .ui-datepicker .ui-datepicker-prev.ui-state-hover::before,
                    .ui-datepicker .ui-datepicker-prev:focus::before {
                        content: '';
                        position: absolute;
                        right: 0;
                        left: 0;
                        bottom: 0.1rem;
                        height: 0.1rem;
                        background-color: #1042A4;
                    }

                    .ui-datepicker .ui-datepicker-next {
                        top: -0.1rem !important;
                        right: -0.8rem !important;
                        cursor: pointer !important;
                    }

                    .ui-datepicker .ui-datepicker-next span {
                        background-position: center !important;
                        background-image: url("../../common/img/icon-calendar-arrow-right.svg") !important;
                        background-size: 1.1rem 1.6rem !important;
                    }

                    .ui-datepicker .ui-datepicker-next.ui-state-hover,
                    .ui-datepicker .ui-datepicker-next:focus {
                        border: 0 !important;
                        top: -0.1rem !important;
                        right: -0.8rem !important;
                        background-color: transparent !important;
                        outline: none !important;
                    }

                    .ui-datepicker .ui-datepicker-next.ui-state-hover::before,
                    .ui-datepicker .ui-datepicker-next:focus::before {
                        content: '';
                        position: absolute;
                        right: 0;
                        left: 0;
                        bottom: 0.1rem;
                        height: 0.1rem;
                        background-color: #1042A4;
                    }

                    .ui-datepicker .ui-datepicker-title {
                        margin-top: -0.2rem !important;
                        line-height: 2.2rem !important;
                    }

                    .ui-datepicker table {
                        margin: 0 !important;
                        font-size: 1.2rem !important;
                    }

                    .ui-datepicker table th {
                        font-weight: normal !important;
                        color: #636974 !important;
                    }

                    .ui-datepicker table td {
                        box-sizing: border-box !important;
                        height: 2.2rem !important;
                        width: 2.4rem !important;
                        padding: 0.2rem !important;
                    }

                    .ui-datepicker table td a {
                        display: flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                        text-align: center !important;
                        height: 2.4rem !important;
                        width: 2.4rem !important;
                        padding: 0 !important;
                        border: 0 !important;
                        color: #333333 !important;
                        box-sizing: border-box !important;
                        border-width: 0.1rem !important;
                        border-style: solid !important;
                        border-color: transparent !important;
                        font-size: 1.2rem;
                    }

                    .ui-datepicker table td a.ui-state-default {
                        height: 2.4rem !important;
                        width: 2.4rem !important;
                    }

                    .ui-datepicker table td a.ui-state-hover,
                    .ui-datepicker table td a:focus {
                        height: 2.4rem !important;
                        width: 2.4rem !important;
                        background-color: transparent !important;
                        border: 0.1rem solid #1042A4 !important;
                        outline: none !important;
                    }

                    .ui-datepicker table td a.ui-state-active {
                        height: 2.4rem !important;
                        width: 2.4rem !important;
                        background-color: #1042A4 !important;
                        color: #FFFFFF !important;
                    }

                    .ui-datepicker table td a.ui-state-highlight {
                        height: 2.4rem !important;
                        width: 2.4rem !important;
                        background-color: #E5EBF5 !important;
                        color: #333333 !important;
                    }

                    .egovuiForm-preview-standard-style {
                        width: 64.4rem;
                        background-color: #FFFFFF;
                        border: 1px solid #C6C9D3;
                    }

                    .egovuiForm-preview-standard-style input[type="text"],
                    .egovuiForm-preview-standard-style textarea {
                        padding-right: 0.8rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-pt2 {
                        padding-top: 0.2rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-pt4 {
                        padding-top: 0.4rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-pl4 {
                        padding-left: 0.4rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-pl6 {
                        padding-left: 0.6rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-pl12 {
                        padding-left: 1.2rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-pl16 {
                        padding-left: 1.6rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-mt3 {
                        margin-top: 0.3rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-mt6 {
                        margin-top: 0.6rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-mt11 {
                        margin-top: 1.1rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-mt12 {
                        margin-top: 1.2rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-mt13 {
                        margin-top: 1.3rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-mt14 {
                        margin-top: 1.4rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-mt17 {
                        margin-top: 1.7rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-lh16 {
                        line-height: 1.6rem !important;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-preview-title {
                        display: flex;
                        align-items: center;
                        min-height: 3.2rem;
                        padding: 0.7rem 2rem;
                        background-color: #D7D7D7;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-preview-title h3,
                    .egovuiForm-preview-standard-style .egovuiForm-preview-title h4 {
                        font-weight: normal;
                        line-height: 1.8rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-pager {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 6.4rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-pager .egovuiForm-prev-button {
                        position: relative;
                        margin-right: 1rem;
                        padding-top: 0.4rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-pager .egovuiForm-prev-button:hover::before,
                    .egovuiForm-preview-standard-style .egovuiForm-pager .egovuiForm-prev-button:focus::before {
                        content: '';
                        position: absolute;
                        right: 0.1rem;
                        left: 0;
                        bottom: 0.2rem;
                        height: 0.1rem;
                        background-color: #1042A4;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-pager .egovuiForm-next-button {
                        position: relative;
                        margin-left: 1rem;
                        padding-top: 0.4rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-pager .egovuiForm-next-button:hover::before,
                    .egovuiForm-preview-standard-style .egovuiForm-pager .egovuiForm-next-button:focus::before {
                        content: '';
                        position: absolute;
                        right: 0.1rem;
                        left: 0;
                        bottom: 0.2rem;
                        height: 0.1rem;
                        background-color: #1042A4;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-select-wrapper {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-bottom: 3.2rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-select-wrapper>div {
                        padding-left: 0.2rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-select-wrapper select {
                        height: 2.8rem;
                        width: 22.4rem;
                        padding-top: 0.2rem;
                        padding-left: 1rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-horizontal-line {
                        height: 0.1rem;
                        margin: 0 2rem;
                        background-color: #D2D4DC;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form {
                        padding: 2rem 1.9rem;
                        background-color: #FFFFFF;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form h4,
                    .egovuiForm-preview-standard-style .egovuiForm-form h5 {
                        font-weight: normal;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form input {
                        height: 2.8rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-flex-box-row {
                        margin-top: 1.6rem;
                        margin-bottom: 0;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-flex-box-row-center {
                        align-items: flex-start !important;
                        margin-top: 1rem;
                        margin-bottom: 0;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-form-label {
                        width: 11.2rem;
                        min-width: 11.2rem;
                        padding-top: 0.4rem;
                        line-height: 2rem;
                        text-align: left;
                        white-space: normal;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-form-label-s {
                        min-width: 4.8rem;
                        margin-right: 1rem;
                        text-align: left;
                        white-space: normal;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label1 {
                        width: 100%;
                        padding-left: 1rem;
                        border-bottom: 0.1rem solid #1042A4;
                        font-weight: bold;
                        line-height: 2.7rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label1-s {
                        width: 100%;
                        padding-left: 1rem;
                        border-bottom: 0.1rem solid #1042A4;
                        font-weight: bold;
                        line-height: 2rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label2 {
                        width: 100%;
                        padding-left: 1rem;
                        border-bottom: 0.1rem solid #C6C9D3;
                        font-weight: bold;
                        line-height: 2.7rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label2-s {
                        width: 100%;
                        padding-left: 1rem;
                        border-bottom: 0.1rem solid #C6C9D3;
                        font-weight: bold;
                        line-height: 2rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label3 {
                        position: relative;
                        width: 100%;
                        padding-left: 1rem;
                        font-weight: bold;
                        line-height: 2.8rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label3::before {
                        content: "";
                        position: absolute;
                        top: 1rem;
                        left: 0;
                        width: 0.6rem;
                        height: 0.6rem;
                        background-color: #1042A4;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label3-s {
                        position: relative;
                        width: 100%;
                        padding-left: 1rem;
                        font-weight: bold;
                        line-height: 2.4rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label3-s::before {
                        content: "";
                        position: absolute;
                        top: 0.9rem;
                        left: 0;
                        width: 0.6rem;
                        height: 0.6rem;
                        background-color: #1042A4;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label4 {
                        position: relative;
                        width: 100%;
                        padding-left: 1rem;
                        font-weight: bold;
                        line-height: 2.8rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label4::before {
                        content: "";
                        position: absolute;
                        top: 1.3rem;
                        left: 0;
                        width: 0.6rem;
                        height: 0.2rem;
                        background-color: #1042A4;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label4-s {
                        position: relative;
                        width: 100%;
                        padding-left: 1rem;
                        font-weight: bold;
                        line-height: 2.4rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label4-s::before {
                        content: "";
                        position: absolute;
                        top: 1.2rem;
                        left: 0;
                        width: 0.6rem;
                        height: 0.1rem;
                        background-color: #1042A4;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label5 {
                        width: 100%;
                        padding-left: 1rem;
                        font-weight: bold;
                        line-height: 2.8rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-intermediate-label5-s {
                        width: 100%;
                        padding-left: 1rem;
                        font-weight: bold;
                        line-height: 2.4rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-address {
                        height: 16rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-preview-phone-number {
                        width: 8rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-preview-phone-number+span {
                        padding: 2px 8px;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-preview-ymd {
                        width: 4.8rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-preview-ymd:first-of-type {
                        width: 6rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-form .egovuiForm-preview-ymd+span {
                        margin-right: 1rem;
                        margin-left: 0.4rem;
                        padding-top: 0.2rem;
                    }

                    .egovuiForm-preview-standard-style .egovuiForm-required,
                    .egovuiForm-preview-standard-style .egovuiForm-optional {
                        margin-right: 0.8rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small {
                        width: 100%;
                        margin-top: 2rem;
                        font-size: 1.2rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-horizontal-line {
                        margin: 0 1.9rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-pager.egovuiForm-pager-header {
                        height: 5.8rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-pager.egovuiForm-pager-footer {
                        height: 5.8rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-select-wrapper {
                        margin-bottom: 2rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-select-wrapper select {
                        height: 2.4rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-form .egovuiForm-form-label {
                        width: 9.5rem;
                        min-width: 9.5rem;
                        margin-right: 0;
                        line-height: 1.6rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-form .egovuiForm-address {
                        height: 9.2rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-form .egovuiForm-preview-phone-number {
                        width: 5.2rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-form .egovuiForm-preview-phone-number+span {
                        padding: 3px 4px;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-form .egovuiForm-preview-ymd {
                        width: 3.6rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-form .egovuiForm-preview-ymd:first-of-type {
                        width: 5.2rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-form .egovuiForm-preview-ymd+span {
                        margin-right: 0.4rem;
                        margin-left: 0.4rem;
                        padding-top: 0.3rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-form input {
                        height: 2.4rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-badge-wrapper {
                        height: 2.4rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-small .egovuiForm-badge-wrapper .egovuiForm-badge {
                        width: 2.4rem;
                        min-width: 2.4rem;
                        height: 1.6rem;
                        font-size: 0.9rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-scroll>.egovuiForm-pager,
                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-scroll>.egovuiForm-select-wrapper,
                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-scroll .egovuiForm-horizontal-line {
                        display: none;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single .egovuiForm-preview-title {
                        min-height: 4.4rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single input[type="text"],
                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single textarea {
                        font-size: 1.6rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single .egovuiForm-pager {
                        height: 6.4rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single .egovuiForm-pager .egovuiForm-prev-button {
                        margin-right: 0.6rem;
                        padding-top: 0.4rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single .egovuiForm-pager span {
                        margin-top: -0.1rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single .egovuiForm-pager .egovuiForm-next-button {
                        margin-left: 0.6rem;
                        padding-top: 0.4rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single .egovuiForm-select-wrapper select {
                        width: 24rem;
                        padding-top: 0.2rem;
                        padding-left: 1.4rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single .egovuiForm-form .egovuiForm-flex-box-row-center {
                        align-items: flex-start !important;
                        margin-top: 1.6rem;
                        margin-bottom: 0;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single .egovuiForm-form .egovuiForm-required,
                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single .egovuiForm-form .egovuiForm-optional {
                        margin-right: 1rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single .egovuiForm-form .egovuiForm-preview-ymd+span {
                        margin-right: 1rem;
                        margin-left: 0.8rem;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single .egovuiForm-display-only-input-wrapper label {
                        margin-left: 5rem;
                    }

                    .egovuiForm-badge-wrapper {
                        height: 2.8rem;
                        display: flex;
                        align-items: center;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge {
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        height: 2.3rem;
                        min-width: 9rem;
                        margin-top: -0.1rem;
                        padding: 0 1rem;
                        background-color: #636974;
                        color: #FFFFFF;
                        font-size: 1.4rem;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-large {
                        min-width: 10rem;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-small {
                        min-width: 6.8rem;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-reverse {
                        background-color: #E5EBF5;
                        color: #333333;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-left {
                        height: 2rem;
                        padding-left: 0.7rem;
                        min-width: 100%;
                        justify-content: flex-start;
                        background-color: #E5EBF5;
                        color: #333333;
                        font-size: 1.4rem;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-alert {
                        background-color: #DE0000;
                        color: #FFFFFF;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-red {
                        background-color: #C30B15;
                        color: #FFFFFF;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-red-notice {
                        background-color: #CA241E;
                        color: #FFFFFF;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-blue {
                        background-color: #4F71B3;
                        color: #FFFFFF;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-darkblue {
                        background-color: #2D5698;
                        color: #FFFFFF;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-green {
                        background-color: #2E7D32;
                        color: #FFFFFF;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-purple {
                        background-color: #7B2D98;
                        color: #FFFFFF;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-disabled {
                        background-color: #D7D7D7;
                        color: #636974;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-required {
                        min-width: 4rem;
                        width: 4rem;
                        height: 1.9rem;
                        padding: 0.1rem 0 0;
                        background-color: #DE0000;
                        color: #FFFFFF;
                        font-size: 1.2rem;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-optional {
                        min-width: 4rem;
                        width: 4rem;
                        height: 1.9rem;
                        padding: 0.1rem 0 0;
                        border: 0.1rem solid #636974;
                        background-color: #FFFFFF;
                        color: #636974;
                        font-size: 1.2rem;
                    }

                    .egovuiForm-badge-wrapper .egovuiForm-badge.egovuiForm-step {
                        min-height: 2.4rem;
                        min-width: 5.6rem;
                        padding: 0.2rem 0.6rem 0.1rem 0.7rem;
                        background-color: #1042A4;
                        font-weight: bold;
                        color: #FFFFFF;
                    }

                    .egovuiForm-eyecatch {
                        display: flex;
                        align-items: center;
                        position: relative;
                        padding-left: 1.2rem;
                        line-height: 2.4rem;
                        font-size: 1.4rem;
                        font-weight: bold;
                    }

                    .egovuiForm-eyecatch::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 0.4rem;
                        height: 2.4rem;
                        background-color: #1042A4;
                    }

                    .egovuiForm-sr-only {
                        position: absolute;
                        width: 0.1rem;
                        height: 0.1rem;
                        padding: 0;
                        overflow: hidden;
                        -webkit-clip-path: rect(0, 0, 0, 0);
                        clip-path: rect(0, 0, 0, 0);
                        white-space: nowrap;
                        border: 0;
                    }

                    .egovuiForm-pointer-events-none {
                        pointer-events: none;
                    }

                    .egovuiForm-pointer-events-auto {
                        pointer-events: auto;
                    }

                    .egovuiForm-scale-pinch-item-wrapper {
                        display: inline-block;
                        position: relative;
                    }

                    .egovuiForm-scale-pinch-item-wrapper .egovuiForm-scale-pinch {
                        position: absolute;
                        display: block;
                        height: 0.8rem;
                        width: 0.8rem;
                        background-color: #FFFFFF;
                        border: 0.1rem solid #FF7700;
                        border-radius: 50%;
                        z-index: 10;
                    }

                    .egovuiForm-scale-pinch-item-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-top-left {
                        top: -0.3rem;
                        left: -0.3rem;
                        cursor: nwse-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-top {
                        top: -0.3rem;
                        left: 50%;
                        transform: translateX(-50%);
                        cursor: ns-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-top-right {
                        top: -0.3rem;
                        right: -0.3rem;
                        cursor: nesw-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-right {
                        top: 50%;
                        right: -0.3rem;
                        transform: translateY(-50%);
                        cursor: ew-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-bottom-right {
                        right: -0.3rem;
                        bottom: -0.3rem;
                        cursor: nwse-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-bottom {
                        bottom: -0.3rem;
                        left: 50%;
                        transform: translateX(-50%);
                        cursor: ns-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-bottom-left {
                        bottom: -0.3rem;
                        left: -0.3rem;
                        cursor: nesw-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-left {
                        top: 50%;
                        left: -0.3rem;
                        transform: translateY(-50%);
                        cursor: ew-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-linked-object input[type="text"],
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-linked-object textarea,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-linked-object select,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-unlinked-object input[type="text"],
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-unlinked-object textarea,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-unlinked-object select {
                        background-color: #FFEACB !important;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover {
                        cursor: pointer;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-linked-object input[type="text"],
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-linked-object textarea,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-linked-object select,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-unlinked-object input[type="text"],
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-unlinked-object textarea,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-unlinked-object select {
                        background-color: #FFF2DE !important;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-linked-object input[type="text"],
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-linked-object textarea,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-linked-object select {
                        border: 0.2rem solid #FF7700 !important;
                        border-radius: 0 !important;
                        pointer-events: none;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-unlinked-object input[type="text"],
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-unlinked-object textarea,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-unlinked-object select {
                        border: 0.2rem dashed #FF7700 !important;
                        border-radius: 0 !important;
                        pointer-events: none;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper.egovuiForm-linked-object .egovuiForm-label {
                        pointer-events: none;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper.egovuiForm-linked-object .egovuiForm-label::before {
                        border: 0.2rem solid #FF7700;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper.egovuiForm-unlinked-object .egovuiForm-label {
                        pointer-events: none;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper.egovuiForm-unlinked-object .egovuiForm-label::before {
                        border: 0.2rem dashed #FF7700;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper.egovuiForm-scale-pinch-item-selected .egovuiForm-label::before {
                        background-color: #FFEACB;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper.egovuiForm-scale-pinch-item-hover .egovuiForm-label::before {
                        background-color: #FFF2DE !important;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch-radio-wrapper {
                        position: absolute;
                        top: 0.4rem;
                        height: 1.6rem;
                        width: 1.6rem;
                        border: 0.1rem solid #FF7700;
                        cursor: pointer;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch {
                        position: absolute;
                        display: block;
                        height: 0.8rem;
                        width: 0.8rem;
                        background-color: #FFFFFF;
                        border: 0.1rem solid #FF7700;
                        border-radius: 50%;
                        z-index: 10;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-top-left {
                        top: -0.5rem;
                        left: -0.5rem;
                        cursor: nwse-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-top {
                        top: -0.5rem;
                        left: 50%;
                        transform: translateX(-50%);
                        cursor: ns-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-top-right {
                        top: -0.5rem;
                        right: -0.5rem;
                        cursor: nesw-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-right {
                        top: 50%;
                        right: -0.5rem;
                        transform: translateY(-50%);
                        cursor: ew-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-bottom-right {
                        right: -0.5rem;
                        bottom: -0.5rem;
                        cursor: nwse-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-bottom {
                        bottom: -0.5rem;
                        left: 50%;
                        transform: translateX(-50%);
                        cursor: ns-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-bottom-left {
                        bottom: -0.5rem;
                        left: -0.5rem;
                        cursor: nesw-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-left {
                        top: 50%;
                        left: -0.5rem;
                        transform: translateY(-50%);
                        cursor: ew-resize;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch {
                        height: 0.6rem;
                        width: 0.6rem;
                        background-color: #FF7700;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-top-left {
                        top: -0.4rem;
                        left: -0.4rem;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-top-right {
                        top: -0.4rem;
                        right: -0.4rem;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-bottom-right {
                        bottom: -0.4rem;
                        right: -0.4rem;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-radio-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-bottom-left {
                        bottom: -0.4rem;
                        left: -0.4rem;
                    }

                    .egovuiForm-masking {
                        position: absolute;
                        top: 1.1rem;
                        left: 2.3rem;
                        height: 3.2rem;
                        min-height: 2rem;
                        width: 6.4rem;
                        min-width: 2rem;
                        background-color: #FFFFFF;
                        border: 0.1rem solid #C6C9D3;
                    }

                    .egovuiForm-masking:hover {
                        border: 0.1rem solid #1042A4;
                        cursor: pointer;
                    }

                    .egovuiForm-masking.egovuiForm-scale-pinch-item-selected {
                        border: 0.1rem solid #1042A4;
                    }

                    .egovuiForm-masking .egovuiForm-scale-pinch {
                        position: absolute;
                        display: block;
                        height: 0.8rem;
                        width: 0.8rem;
                        background-color: #FFFFFF;
                        border: 0.1rem solid #1042A4;
                        border-radius: 50%;
                        z-index: 10;
                    }

                    .egovuiForm-masking .egovuiForm-scale-pinch.egovuiForm-scale-pinch-top-left {
                        top: -0.5rem;
                        left: -0.5rem;
                        cursor: nwse-resize;
                    }

                    .egovuiForm-masking .egovuiForm-scale-pinch.egovuiForm-scale-pinch-top {
                        top: -0.5rem;
                        left: 50%;
                        transform: translateX(-50%);
                        cursor: ns-resize;
                    }

                    .egovuiForm-masking .egovuiForm-scale-pinch.egovuiForm-scale-pinch-top-right {
                        top: -0.5rem;
                        right: -0.5rem;
                        cursor: nesw-resize;
                    }

                    .egovuiForm-masking .egovuiForm-scale-pinch.egovuiForm-scale-pinch-right {
                        top: 50%;
                        right: -0.5rem;
                        transform: translateY(-50%);
                        cursor: ew-resize;
                    }

                    .egovuiForm-masking .egovuiForm-scale-pinch.egovuiForm-scale-pinch-bottom-right {
                        right: -0.5rem;
                        bottom: -0.5rem;
                        cursor: nwse-resize;
                    }

                    .egovuiForm-masking .egovuiForm-scale-pinch.egovuiForm-scale-pinch-bottom {
                        bottom: -0.5rem;
                        left: 50%;
                        transform: translateX(-50%);
                        cursor: ns-resize;
                    }

                    .egovuiForm-masking .egovuiForm-scale-pinch.egovuiForm-scale-pinch-bottom-left {
                        bottom: -0.5rem;
                        left: -0.5rem;
                        cursor: nesw-resize;
                    }

                    .egovuiForm-masking .egovuiForm-scale-pinch.egovuiForm-scale-pinch-left {
                        top: 50%;
                        left: -0.5rem;
                        transform: translateY(-50%);
                        cursor: ew-resize;
                    }

                    .egovuiForm-warning-description {
                        display: flex;
                        padding: 1rem 1rem 0.9rem 0.9rem;
                        background-color: #FFF8D2;
                        border: 1px solid #E8DCBA;
                        line-height: 1.6rem;
                    }

                    .egovuiForm-warning-description .egovuiForm-item-warning-icon {
                        margin-top: -0.1rem;
                        margin-right: 0.8rem;
                    }

                    .egovuiForm-warning-description>div {
                        flex: 1;
                    }

                    .egovuiForm-spinner-bg {
                        position: fixed;
                        top: 0;
                        left: 0;
                        display: none;
                        width: 100%;
                        height: 100%;
                        z-index: 300;
                    }

                    .egovuiForm-spinner-bg.egovuiForm-spinner-for-dialog {
                        background-color: rgba(0, 0, 0, 0.6);
                    }

                    .egovuiForm-spinner-area {
                        position: absolute;
                        top: calc(50% - 3.2rem);
                        left: calc(50% - 3.2rem);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        width: 6.4rem;
                        height: 6.4rem;
                        background-color: #FFFFFF;
                        border: 0.1rem solid #D7D7D7;
                        box-shadow: 0 0.3rem 0.6rem rgba(0, 0, 0, 0.16);
                    }

                    .egovuiForm-spinner {
                        position: relative;
                        display: inline-block;
                        width: 4rem;
                        height: 4rem;
                    }

                    .egovuiForm-spinner>span {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                    }

                    .egovuiForm-spinner>span::before {
                        content: '';
                        display: block;
                        margin: 0 auto;
                        width: 15%;
                        height: 15%;
                        background-color: #1042A4;
                        border-radius: 100%;
                        -webkit-animation: egovuiForm-spinner-animation 0%, 1.2s infinite ease-in-out both;
                        animation: egovuiForm-spinner-animation 1.2s infinite ease-in-out both;
                    }

                    .egovuiForm-spinner>span:nth-child(2) {
                        transform: rotate(30deg);
                    }

                    .egovuiForm-spinner>span:nth-child(2)::before {
                        -webkit-animation-delay: -1.1s;
                        animation-delay: -1.1s;
                    }

                    .egovuiForm-spinner>span:nth-child(3) {
                        transform: rotate(60deg);
                    }

                    .egovuiForm-spinner>span:nth-child(3)::before {
                        -webkit-animation-delay: -1s;
                        animation-delay: -1s;
                    }

                    .egovuiForm-spinner>span:nth-child(4) {
                        transform: rotate(90deg);
                    }

                    .egovuiForm-spinner>span:nth-child(4)::before {
                        -webkit-animation-delay: -0.9s;
                        animation-delay: -0.9s;
                    }

                    .egovuiForm-spinner>span:nth-child(5) {
                        transform: rotate(120deg);
                    }

                    .egovuiForm-spinner>span:nth-child(5)::before {
                        -webkit-animation-delay: -0.8s;
                        animation-delay: -0.8s;
                    }

                    .egovuiForm-spinner>span:nth-child(6) {
                        transform: rotate(150deg);
                    }

                    .egovuiForm-spinner>span:nth-child(6)::before {
                        -webkit-animation-delay: -0.7s;
                        animation-delay: -0.7s;
                    }

                    .egovuiForm-spinner>span:nth-child(7) {
                        transform: rotate(180deg);
                    }

                    .egovuiForm-spinner>span:nth-child(7)::before {
                        -webkit-animation-delay: -0.6s;
                        animation-delay: -0.6s;
                    }

                    .egovuiForm-spinner>span:nth-child(8) {
                        transform: rotate(210deg);
                    }

                    .egovuiForm-spinner>span:nth-child(8)::before {
                        -webkit-animation-delay: -0.5s;
                        animation-delay: -0.5s;
                    }

                    .egovuiForm-spinner>span:nth-child(9) {
                        transform: rotate(240deg);
                    }

                    .egovuiForm-spinner>span:nth-child(9)::before {
                        -webkit-animation-delay: -0.4s;
                        animation-delay: -0.4s;
                    }

                    .egovuiForm-spinner>span:nth-child(10) {
                        transform: rotate(270deg);
                    }

                    .egovuiForm-spinner>span:nth-child(10)::before {
                        -webkit-animation-delay: -0.3s;
                        animation-delay: -0.3s;
                    }

                    .egovuiForm-spinner>span:nth-child(11) {
                        transform: rotate(300deg);
                    }

                    .egovuiForm-spinner>span:nth-child(11)::before {
                        -webkit-animation-delay: -0.2s;
                        animation-delay: -0.2s;
                    }

                    .egovuiForm-spinner>span:nth-child(12) {
                        transform: rotate(330deg);
                    }

                    .egovuiForm-spinner>span:nth-child(12)::before {
                        -webkit-animation-delay: -0.1s;
                        animation-delay: -0.1s;
                    }

                    @-webkit-keyframes egovuiForm-spinner-animation {

                        0%,
                        39%,
                        100% {
                            opacity: 0;
                        }

                        40% {
                            opacity: 1;
                        }
                    }

                    @keyframes egovuiForm-spinner-animation {

                        0%,
                        39%,
                        100% {
                            opacity: 0;
                        }

                        40% {
                            opacity: 1;
                        }
                    }

                    .egovuiForm-error-description-wrapper {
                        padding: 0 0 1rem 0;
                    }

                    .egovuiForm-error-description-wrapper .egovuiForm-error-description {
                        width: 100%;
                        padding: 0.4rem 1rem 0.4rem 0.9rem;
                        background-color: #FFEBEB;
                        border: 0.1rem solid #EED4D4;
                    }

                    .egovuiForm-error-description-wrapper .egovuiForm-error-description div {
                        display: flex;
                        align-items: center;
                        padding-top: 0.4rem;
                        padding-bottom: 0.4rem;
                    }

                    .egovuiForm-error-description-wrapper .egovuiForm-error-description span {
                        margin-left: 0.8rem;
                        line-height: 1.6rem;
                        color: #CA241E;
                        font-weight: bold;
                    }

                    .egovuiForm-error-description-wrapper .egovuiForm-error-description ul {
                        margin-top: 0.4rem;
                        margin-bottom: 0.4rem;
                        padding-left: 3.4rem;
                        color: #CA241E;
                    }

                    .egovuiForm-error-description-wrapper .egovuiForm-error-description ul .egovuiForm-bullet-point {
                        position: relative;
                        line-height: 1.6rem;
                    }

                    .egovuiForm-error-description-wrapper .egovuiForm-error-description ul .egovuiForm-bullet-point::before {
                        content: "・";
                        position: absolute;
                        top: -0.1rem;
                        left: -1.2rem;
                    }

                    .egovuiForm-error-description-wrapper .egovuiForm-error-description ul .egovuiForm-bullet-point+.egovuiForm-bullet-point {
                        margin-top: 0.2rem;
                    }

                    .egovuiForm-required-item-error-description {
                        display: flex;
                        align-items: flex-start;
                        color: #CA241E;
                        font-weight: bold;
                    }

                    .egovuiForm-required-item-error-description.egovuiForm-position-absolute-item {
                        position: absolute;
                        top: -2.1rem;
                        left: 0;
                    }

                    .egovuiForm-required-item-error-description.egovuiForm-position-absolute-item span {
                        white-space: nowrap;
                    }

                    .egovuiForm-required-item-error-description ul {
                        margin-top: 0.4rem;
                        margin-bottom: 0.1rem;
                        padding-left: 3rem;
                        font-weight: normal;
                    }

                    .egovuiForm-required-item-error-description ul .egovuiForm-bullet-point {
                        position: relative;
                        line-height: 1.6rem;
                    }

                    .egovuiForm-required-item-error-description ul .egovuiForm-bullet-point+.egovuiForm-bullet-point {
                        margin-top: 0.2rem;
                    }

                    .egovuiForm-required-item-error-description ul .egovuiForm-bullet-point::before {
                        content: "・";
                        position: absolute;
                        top: -0.1rem;
                        left: -1.2rem;
                    }

                    .egovuiForm-required-item-error-description .egovuiForm-item-error-icon-wrapper {
                        display: flex;
                        align-items: center;
                        height: 1.8rem;
                        min-width: 1.8rem;
                    }

                    .egovuiForm-Multiple-lines-error {
                        position: relative;
                        top: -0.9rem;
                    }

                    .egovuiForm-preview-style .egovuiForm-display-only-input-wrapper label {
                        margin-left: 3.2rem;
                    }

                    .egovuiForm-preview-style .egovuiForm-display-only-input-wrapper input {
                        padding-left: 1rem;
                        border: none;
                    }
                </style>
                <style>
                    body#egovuiMain #egovuiProcedureInformationDetail .egovuiForm-error-description-wrapper .egovuiForm-error-description {
                    height: auto;
                    }
                    body#egovuiEditStyle.egovuiForm-edit-style-error #configurationManagement .egovuiForm-required-item-error-description span {
                    margin-left: 0.4rem;
                    }
                    .flip-list-move {
                    transition: transform 0.3s;
                    }
                    .fade-enter-active, .fade-leave-active {
                    transition: opacity 0.3s;
                    }
                    .fade-enter, .fade-leave-to {
                    opacity: 0;
                    }

                    a[href].link-decoration:hover{
                    text-decoration: underline;
                    }

                    body#egovuiMaintenance #dialogErrorAlert {
                    min-height: 19.8rem;
                    width: 52rem;
                    }

                    body input.egovuiForm-input-error,
                    body select.egovuiForm-input-error,
                    body textarea.egovuiForm-input-error,
                    body div.egovuiForm-radio-wrapper.egovuiForm-input-error  {
                    background-color: #FFEBEB;
                    border: 1px solid #EED4D4;
                    }

                    .egovuiForm-disabled-style .egovuiForm-disabled-style {
                    opacity: initial !important;
                    }

                    body#egovuiEditStyle.egovuiForm-edit-style-error .egovuiForm-error-description {
                    min-height: 3.5rem;
                    }

                    .legal-frame-element input[type="text"] {
                    padding: 0.2rem 0.3rem;
                    opacity: 0.9;
                    }
                    .legal-frame-element select {
                    padding: 0.2rem 0.3rem;
                    opacity: 0.9;
                    }

                    .legal-frame-element:hover input,
                    .legal-frame-element:hover textarea,
                    .legal-frame-element:hover select,
                    .legal-frame-element:hover label:before {
                    background-color: #FFF2DE !important;
                    }

                    button .cover-label {
                    position: absolute;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    cursor: pointer;
                    }

                    .egovuiForm-tree li.has-children > span {
                    font-weight: bold;
                    }
                    body#egovuiEditStyle .egovuiForm-main .egovuiForm-tabs-detail #event textarea{
                    height: auto;
                    }
                    body#egovuiEditStyle #legalForm #legalFormImage #legalFormCanvas{
                    display: block;
                    overflow: scroll;
                    padding: 0.2rem;
                    border: none;
                    box-shadow: none;
                    }
                    body#egovuiEditStyle #legalForm #legalFormImage #legalFormCanvasInnner{
                    padding-bottom: 10rem;
                    transform-origin: 0% 0%;
                    transform: scale(1);
                    float: left;
                    border: 0.1rem solid #D7D7D7;
                    box-shadow: 0 0.3rem 0.6rem rgba(0, 0, 0, 0.16);
                    }

                    .egovuiForm-preview-standard-style input[type="password"], 
                    .egovuiForm-preview-standard-style input[type="tel"], 
                    .egovuiForm-preview-standard-style input[type="url"], 
                    .egovuiForm-preview-standard-style input[type="email"], 
                    .egovuiForm-preview-standard-style input[type="datetime"], 
                    .egovuiForm-preview-standard-style input[type="date"]{
                    width: 100%;
                    height: 2.4rem;
                    padding: 0.2rem 0.8rem 0.2rem 0.9rem;
                    border: 0.1rem solid #C6C9D3;
                    border-radius: 0.3rem;
                    background-color: #FFFFFF;
                    font-size: 1.6rem;
                    font-family: inherit;
                    }

                    .egovuiForm-tree li span {
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                    }

                    input[type='number'] {
                    -webkit-appearance: none;
                    -moz-appearance: none;
                    appearance: none;
                    color: inherit;
                    font-family: inherit;
                    font-size: inherit;
                    height: 2.4rem;
                    background-color: #FFFFFF;
                    border: solid 0.1rem #E5EBF5;
                    border-radius: 0.3rem;
                    }

                    input[type='number']:focus,
                    input[type='password']:focus {
                    outline: 0;
                    border: 0.1rem solid #1042A4 !important;
                    border-radius: 0.3rem;
                    }

                    input[type='number']::-webkit-input-placeholder,
                    input[type='password']::-webkit-input-placeholder {
                    color: #C6C9D3;
                    }

                    input[type='number']::-moz-placeholder,
                    input[type='password']::-moz-placeholder {
                    color: #C6C9D3;
                    }

                    input[type='number']:-ms-input-placeholder,
                    input[type='password']:-ms-input-placeholder {
                    color: #C6C9D3;
                    }

                    input[type='number']::-ms-input-placeholder,
                    input[type='password']::-ms-input-placeholder {
                    color: #C6C9D3;
                    }

                    input[type='number']::placeholder, 
                    input[type='password']::placeholder {
                    color: #C6C9D3;
                    }

                    input[type='number'][readonly],
                    input[type='password'][readonly] {
                    border-color: #D7D7D7;
                    background: transparent;
                    }

                    input[type='number'].egovuiForm-input-error:focus, 
                    input[type='password'].egovuiForm-input-error:focus {
                    outline: 0;
                    border: 0.1rem solid #CA241E !important;
                    border-radius: 0.3rem;
                    }

                    input[type='number'].egovuiForm-w48 {
                    width: 4.8rem;
                    }
                    input[type='number'].egovuiForm-w60 {
                    width: 6rem;
                    }
                    input[type='number'].egovuiForm-w80 {
                    width: 8rem;
                    }
                    input[type='number'].egovuiForm-w168,
                    input[type='password'].egovuiForm-w168 {
                    width: 16.8rem;
                    min-width: 16.8rem;
                    }

                    input[type='number'],
                    input[type='password'] {
                    width: 100%;
                    height: 2.4rem;
                    padding: 0.2rem 0.9rem;
                    border: 0.1rem solid #C6C9D3;
                    border-radius: 0.3rem;
                    background-color: #FFFFFF;
                    font-size: 1.2rem;
                    font-family: inherit;
                    }

                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single input[type="number"] {
                    font-size: 1.6rem;
                    }
                    .egovuiForm-preview-standard-style input[type="number"] {
                    padding-right: 0.8rem;
                    }


                    body#egovuiMain.egovuiForm-one-scroll
                    main
                    #egovuiProcedureInformation
                    > .egovuiForm-scroll-x
                    .egovuiForm-table-wrapper
                    table.egovuiForm-tb-style
                    th:nth-child(6) {
                    width: 13.5rem;
                    min-width: 13.5rem;
                    }
                    body#egovuiMain.egovuiForm-one-scroll
                    main
                    #egovuiProcedureInformation
                    > .egovuiForm-scroll-x
                    .egovuiForm-table-wrapper
                    table.egovuiForm-tb-style
                    td:nth-child(6) {
                    width: 11.8rem;
                    min-width: 11.8rem;
                    }
                    body#egovuiMain.egovuiForm-one-scroll
                    main
                    #egovuiProcedureInformation
                    > .egovuiForm-scroll-x
                    .egovuiForm-table-wrapper
                    table.egovuiForm-tb-style {
                    min-width: 79.4rem;
                    }
                    body#egovuiMain #egovuiProcedureInformationDetail #style .egovuiForm-form #managementInformationFormEntryProcedure {
                    width: 30rem;
                    }
                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single .egovuiForm-form h5:not(:first-of-type) {
                    margin-top: 1.6rem;
                    }

                    body.egovui-input-application {
                    font-size: 1.6rem;
                    }
                </style>
                <div class="egovuiForm-preview-style egovuiForm-preview-legal-style">
                    <style>
                        .egovuiForm-preview-style.egovuiForm-preview-legal-style {
                        margin-top: 3.2rem;
                        }
                        .egovuiForm-preview-style.egovuiForm-preview-legal-style .egov-tool-wrapper {
                        position: relative;
                        overflow: visible;
                        }
                        .egovuiForm-preview-style.egovuiForm-preview-legal-style .egov-tool-wrapper input,
                        .egovuiForm-preview-style.egovuiForm-preview-legal-style .egov-tool-wrapper select,
                        .egovuiForm-preview-style.egovuiForm-preview-legal-style .egov-tool-wrapper textarea {
                        color: #000000;
                        font-family: sans-serif;
                        min-height: initial;
                        }
                        .egovuiForm-preview-style.egovuiForm-preview-legal-style .egov-tool-field-origin{
                        position: absolute;
                        z-index: 2;
                        }
                        .egovuiForm-preview-style.egovuiForm-preview-legal-style .egov-tool-field-rect {
                        box-sizing: border-box;
                        -moz-box-sizing: border-box;
                        background-color: #FCF3C3;
                        padding: 0px;
                        overflow: hidden;
                        border: none;
                        position: absolute;
                        border-radius: 0px;
                        }
                        .egovuiForm-preview-style.egovuiForm-preview-legal-style .egov-tool-field-rect:disabled {
                        background-color: #ffffff;
                        }
                        .egovuiForm-preview-style.egovuiForm-preview-legal-style .egov-tool-wrapper img {
                        margin: 0px !important;
                        max-width: 772px;
                        min-width: 772px;
                        height: auto;
                        }

                        

                        .egovuiForm-preview-style.egovuiForm-preview-legal-style select{
                        min-height: 10px;
                        min-width: 10px;
                        }
                        div.popup {
                            display: none;
                            position: absolute;
                            z-index: 3;
                            background: #555;
                            padding: 4px 12px;
                            font-size: 0.9rem;
                            font-weight: 600;
                            line-height: 1.8;
                            animation: fadeIn 0.3s;
                            color: #FFF;
                            border-radius: 3px;
                            text-align: left;
                        }
                        .preview-area input[type="CHECKBOX"]::before {
                                            display: none;
                        }
                        .preview-area input.checkboxs::before {
                                            display: block;
                        }

                        @keyframes fadeIn {
                        from {opacity: 0;}
                        to {opacity:1 ;}
                        }
                    </style>
                    <form class="egovuiForm-form">
                        <div class="egov-tool-wrapper">
                        <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left: 268px; top: 13px; width:15px; line-height:12px; height:15px; text-align:left; font-size:16px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                            <INPUT class="checkboxs" tabindex="50" value="1" style="position:absolute; top:1px; left:3px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:12px; margin:auto;"
                                type="CHECKBOX" id="N3_P1" name="health_insurance" <?php echo old('health_insurance') == '1' ? 'checked' : ''; ?>/>
                        <SPAN style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>

                        <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 0); left: 268px; top: 40px; width:15px; line-height:12px; height:15px; text-align:left; font-size:16px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                            <INPUT class="checkboxs" tabindex="50" value="1" style="position:absolute; top:1px; left:3px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:12px; margin:auto;"
                                type="CHECKBOX" id="N4_P1" name="pension" <?php echo old('pension') == '1' ? 'checked' : ''; ?>/>
                        <SPAN style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>

     
                            <div class="egov-tool-field-origin" style="left: 91px; top: 67px;">
                                <input class="egov-tool-field-rect" id="N6_P1" name="submission_year" value="{{ old('submission_year') }}" onfocus="addlength(this,2)" required="required" style="width: 25px; height: 18px; font-size: 12px; text-align: center; line-height: 24px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 125px; top: 67px;">
                                <input class="egov-tool-field-rect" id="N7_P1" name="submission_month" value="{{ old('submission_month') }}" onfocus="addlength(this,2)" required="required" style="width: 25px; height: 18px; font-size: 12px; text-align: center; line-height: 24px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 159px; top: 67px;">
                                <input class="egov-tool-field-rect" id="N8_P1" name="submission_day" value="{{ old('submission_day') }}" onfocus="addlength(this,2)" required="required" style="width: 25px; height: 18px; font-size: 12px; text-align: center; line-height: 24px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 160px; top: 87px;">
                                <input class="egov-tool-field-rect" id="N9_P1" maxlength="2" name="pension_office_reference_prefecture" value="{{ old('pension_office_reference_prefecture') }}" required="required" style="width: 32px; height: 15px; font-size: 12px; text-align: center; line-height: 24px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 194px; top: 87px;">
                                <input class="egov-tool-field-rect" id="N10_P1" maxlength="2" name="pension_office_reference_no_cities" value="{{ old('pension_office_reference_no_cities') }}" required="required" style="width: 43px; height: 15px; font-size: 12px; text-align: center; line-height: 24px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 241px; top: 87px;">
                                <input class="egov-tool-field-rect" id="N11_P1" maxlength="4" name="pension_office_reference_no_office" value="{{ old('pension_office_reference_no_office') }}" required="required" style="width: 44px; height: 15px; font-size: 12px; text-align: center; line-height: 24px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 360px; top: 87px;">
                                <input class="egov-tool-field-rect" id="N12_P1" maxlength="5" name="insurance_office_no" value="{{ old('insurance_office_no') }}" required="required" style="width: 89px; height: 16px; font-size: 12px; text-align: right; line-height: 24px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 191px; top: 106px;">
                                <input class="egov-tool-field-rect" id="N13_P1" maxlength="3" name="post_code_former" value="{{ old('post_code_former') }}" required="required" style="width: 30px; height: 17px; font-size: 10px; text-align: center; line-height: 21px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 232px; top: 106px;">
                                <input class="egov-tool-field-rect" id="N14_P1" maxlength="4" name="post_code_latter" value="{{ old('post_code_latter') }}" required="required" style="width: 40px; height: 17px; font-size: 10px; text-align: center; line-height: 21px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 173px; top: 125px;">
                                <input class="egov-tool-field-rect" id="N15_P1" maxlength="50" name="branch_address" value="{{ old('branch_address') }}" required="required" style="width: 276px; height: 26px; font-size: 10px; text-align: left; line-height: 12px; padding: 3px; background-color:rgb(255, 255, 0); overflow-wrap: break-word; word-wrap: break-word;">
                            </div>
                            <div class="egov-tool-field-origin" style="left: 173px; top: 153px;">
                                <input class="egov-tool-field-rect" id="N16_P1" maxlength="34" name="branch_name" value="{{ old('branch_name') }}" required="required" style="width: 276px; height: 26px; font-size: 10px; text-align: left; line-height: 12px; padding: 3px; background-color:rgb(255, 255, 0); overflow-wrap: break-word; word-wrap: break-word;">
                            </div>
                            <div class="egov-tool-field-origin" style="left: 173px; top: 181px;">
                                <input class="egov-tool-field-rect" id="N17_P1" maxlength="25" name="entrepreneur_name" value="{{ old('entrepreneur_name') }}" required="required" style="width: 276px; height: 26px; font-size: 10px; text-align: left; line-height: 12px; padding: 3px; background-color:rgb(255, 255, 0); overflow-wrap: break-word; word-wrap: break-word;">
                            </div>
                            <div class="egov-tool-field-origin" style="left: 186px; top: 209px;">
                                <input class="egov-tool-field-rect" id="N19_P1" maxlength="5" name="branch_tel_area_code" value="{{ old('branch_tel_area_code') }}" required="required" style="width: 52px; height: 20px; font-size: 10px; text-align: center; line-height: 24px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 255px; top: 209px;">
                                <input class="egov-tool-field-rect" id="N20_P1" maxlength="4" name="branch_tel_city_code" value="{{ old('branch_tel_city_code') }}" required="required" style="width: 52px; height: 20px; font-size: 10px; text-align: center; line-height: 24px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 324px; top: 209px;">
                                <input class="egov-tool-field-rect" id="N21_P1" maxlength="5" name="branch_tel_subscriber_code" value="{{ old('branch_tel_subscriber_code') }}" required="required" style="width: 52px; height: 20px; font-size: 10px; text-align: center; line-height: 24px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 459px; top: 209px;">
                                <input class="egov-tool-field-rect" id="N22_P1" maxlength="40" name="labor_consultant_name" value="{{ old('labor_consultant_name') }}" style="width: 273px; height: 22px; font-size: 12px; text-align: center; line-height: 12px; padding: 3px; background-color:rgb(255, 255, 0); overflow-wrap: break-word; word-wrap: break-word;">
                            </div>
                            <div class="egov-tool-field-origin" style="left: 70px; top: 256px;">
                                <input class="egov-tool-field-rect" id="N23_P1" name="insured_reference_number" value="{{ old('insured_reference_number') }}" onfocus="addlength(this,6)" style="width: 152px; height: 50px; font-size: 12px; text-align: right; line-height: 78px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 267px; top: 256px;">
                                <input class="egov-tool-field-rect" id="N24_P1" maxlength="25" name="name_kana" value="{{ old('name_kana') }}" required="required" style="width: 289px; height: 25px; font-size: 12px; text-align: center; line-height: 12px; padding: 3px; background-color:rgb(255, 255, 0); overflow-wrap: break-word; word-wrap: break-word;">
                            </div>
                            <div class="egov-tool-field-origin" style="left: 226px; top: 283px;">
                                <input class="egov-tool-field-rect" id="N25_P1" maxlength="12" name="name" value="{{ old('name') }}" required="required" style="width: 330px; height: 22px; font-size: 12px; text-align: center; line-height: 12px; padding: 3px; background-color:rgb(255, 255, 0); overflow-wrap: break-word; word-wrap: break-word;">
                            </div>
                            <div class="egov-tool-field-origin" style="left: 559px; top: 270px;">
                                <select class="egov-tool-field-rect" id="N27_P1" name="birthday_era" required="required" style="width: 44px; height: 30px; font-size: 12px; text-align: left; line-height: 30px; padding: -1px; background-color:rgb(255, 255, 0); letter-spacing: -1.5px;">
                                    <option selected="" value="5" {{ old('birthday_era') == '5' ? 'selected' : '' }}>
                                    昭和
                                    </option>
                                    <option value="7" {{ old('birthday_era') == '7' ? 'selected' : '' }}>
                                    平成
                                    </option>
                                    <option value="9" {{ old('birthday_era') == '9' ? 'selected' : '' }}>
                                    令和
                                    </option>
                                </select>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 606px; top: 270px;">
                                <input class="egov-tool-field-rect" id="N28_P1" name="birthday_year" value="{{ old('birthday_year') }}" onfocus="addlength(this,2)" required="required" style="width: 41px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 648px; top: 270px;">
                                <input class="egov-tool-field-rect" id="N29_P1" name="birthday_month" value="{{ old('birthday_month') }}" onfocus="addlength(this,2)" required="required" style="width: 41px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 691px; top: 270px;">
                                <input class="egov-tool-field-rect" id="N30_P1" name="birthday_day" value="{{ old('birthday_day') }}" onfocus="addlength(this,2)" required="required" style="width: 41px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 70px; top: 326px;">
                                <input class="egov-tool-field-rect" id="N31_P1" maxlength="12" name="mynumber_card_no" value="{{ old('mynumber_card_no') }}" style="width: 269px; height: 63px; font-size: 12px; text-align: right; line-height: 96px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 342px; top: 345px;">
                                <select class="egov-tool-field-rect" id="N33_P1" name="loss_era" style="width: 46px; height: 30px; font-size: 12px; text-align: left; line-height: 30px; padding: inherit; background-color:rgb(255, 255, 0);">
                                    <option value=""  {{ old('loss_era') == '' ? 'selected' : '' }}>
                                    </option>
                                    <option value="平成" {{ old('loss_era') == '平成' ? 'selected' : '' }}>
                                    平成
                                    </option>
                                    <option value="令和" {{ old('loss_era') == '令和' ? 'selected' : '' }}>
                                    令和
                                    </option>
                                </select>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 390px; top: 345px;">
                                <input class="egov-tool-field-rect" id="N34_P1" name="loss_year" value="{{ old('loss_year') }}" onfocus="addlength(this,2)" style="width: 41px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 433px; top: 345px;">
                                <input class="egov-tool-field-rect" id="N35_P1" name="loss_month" value="{{ old('loss_month') }}" onfocus="addlength(this,2)" style="width: 41px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 476px; top: 345px;">
                                <input class="egov-tool-field-rect" id="N36_P1" name="loss_day" value="{{ old('loss_day') }}" onfocus="addlength(this,2)" style="width: 41px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin egovuiForm-radio-wrapper" style="position: absolute; left: 526px; top: 323px;">
                                <input id="N37_P1_0" name="loss_reason" required="required" type="radio" value="4" <?php echo (old('loss_reason') == '4') ? 'checked' : ''; ?>/>
                                <label class="egovuiForm-label" for="N37_P1_0" style="font-size: 12px;">
                                </label>
                            </div>
                            <div class="egov-tool-field-origin egovuiForm-radio-wrapper" style="position: absolute; left: 526px; top: 336px;">
                                <input id="N37_P1_1" name="loss_reason" required="required" type="radio" value="5" <?php echo (old('loss_reason') == '5') ? 'checked' : ''; ?>/>
                                <label class="egovuiForm-label" for="N37_P1_1" style="font-size: 12px;">
                                </label>
                            </div>
                            <div class="egov-tool-field-origin egovuiForm-radio-wrapper" style="position: absolute; left: 526px; top: 349px;">
                                <input id="N37_P1_2" name="loss_reason" required="required" type="radio" value="7" <?php echo (old('loss_reason') == '7') ? 'checked' : ''; ?>/>
                                <label class="egovuiForm-label" for="N37_P1_2" style="font-size: 12px;">
                                </label>
                            </div>
                            <div class="egov-tool-field-origin egovuiForm-radio-wrapper" style="position: absolute; left: 526px; top: 362px;">
                                <input id="N37_P1_3" name="loss_reason" required="required" type="radio" value="9" <?php echo (old('loss_reason') == '9') ? 'checked' : ''; ?>/>
                                <label class="egovuiForm-label" for="N37_P1_3" style="font-size: 12px;">
                                </label>
                            </div>
                            <div class="egov-tool-field-origin egovuiForm-radio-wrapper" style="position: absolute; left: 526px; top: 375px;">
                                <input id="N37_P1_4" name="loss_reason" required="required" type="radio" value="11" <?php echo (old('loss_reason') == '11') ? 'checked' : ''; ?>/>
                                <label class="egovuiForm-label" for="N37_P1_4" style="font-size: 12px;">
                                </label>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 570px; top: 326px;">
                                <select class="egov-tool-field-rect" id="N39_P1" name="retirement_date_era" style="width: 44px; height: 12px; font-size: 10px; text-align: left; line-height: 17px; padding: inherit; background-color:rgb(255, 255, 0);">
                                    <option value="">
                                    </option>
                                    <option value="平成" {{ old('retirement_date_era') == '平成' ? 'selected' : '' }}>
                                    平成
                                    </option>
                                    <option value="令和" {{ old('loss_retirement_date_eraera') == '令和' ? 'selected' : '' }}>
                                    令和
                                    </option>
                                </select>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 615px; top: 326px;">
                                <input class="egov-tool-field-rect" id="N40_P1" name="retirement_date_year" value="{{ old('retirement_date_year') }}" onfocus="addlength(this,2)" style="width: 21px; height: 10px; font-size: 10px; text-align: center; line-height: 17px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 643px; top: 326px;">
                                <input class="egov-tool-field-rect" id="N41_P1" name="retirement_date_month" value="{{ old('retirement_date_month') }}" onfocus="addlength(this,2)" style="width: 21px; height: 10px; font-size: 10px; text-align: center; line-height: 17px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 671px; top: 326px;">
                                <input class="egov-tool-field-rect" id="N42_P1" name="retirement_date_day" value="{{ old('retirement_date_day') }}" onfocus="addlength(this,2)" style="width: 21px; height: 10px; font-size: 10px; text-align: center; line-height: 17px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 570px; top: 340px;">
                                <select class="egov-tool-field-rect" id="N44_P1" name="passed_away_date_era" style="width: 44px; height: 12px; font-size: 10px; text-align: left; line-height: 17px; padding: inherit; background-color:rgb(255, 255, 0);">
                                    <option value="">
                                    </option>
                                    <option value="平成" {{ old('passed_away_date_era') == '平成' ? 'selected' : '' }}>
                                    平成
                                    </option>
                                    <option value="令和" {{ old('passed_away_date_era') == '令和' ? 'selected' : '' }}>
                                    令和
                                    </option>
                                </select>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 615px; top: 340px;">
                                <input class="egov-tool-field-rect" id="N45_P1" name="passed_away_date_year" value="{{ old('passed_away_date_year') }}" onfocus="addlength(this,2)" style="width: 21px; height: 10px; font-size: 10px; text-align: center; line-height: 17px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 643px; top: 340px;">
                                <input class="egov-tool-field-rect" id="N46_P1" name="passed_away_date_month" value="{{ old('passed_away_date_month') }}" onfocus="addlength(this,2)" style="width: 21px; height: 10px; font-size: 10px; text-align: center; line-height: 17px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 671px; top: 340px;">
                                <input class="egov-tool-field-rect" id="N47_P1" name="passed_away_date_day" value="{{ old('passed_away_date_day') }}" onfocus="addlength(this,2)" style="width: 21px; height: 10px; font-size: 10px; text-align: center; line-height: 17px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin egovuiForm-checkbox-wrapper" style="left: 76px; top: 413px;">
                                <input id="N48_P1" name="loss_of_employees" type="checkbox" value="1" <?php echo (old('loss_of_employees') == '1') ? 'checked' : ''; ?>/>
                                <label class="egovuiForm-label" for="N48_P1" style="font-size: 12px;">
                                </label>
                            </div>
                            <div class="egov-tool-field-origin egovuiForm-checkbox-wrapper" style="left: 76px; top: 427px;">
                                <input id="N49_P1" name="loss_of_continued_reemployment_after_retirement" type="checkbox" value="1" <?php echo (old('loss_of_continued_reemployment_after_retirement') == '1') ? 'checked' : ''; ?>/>
                                <label class="egovuiForm-label" for="N49_P1" style="font-size: 12px;">
                                </label>
                            </div>
                            <div class="egov-tool-field-origin egovuiForm-checkbox-wrapper" style="left: 76px; top: 441px;">
                                <input id="N50_P1" name="remarks_other" type="checkbox" value="1" <?php echo (old('remarks_other') == '1') ? 'checked' : ''; ?>/>
                                <label class="egovuiForm-label" for="N50_P1" style="font-size: 12px;">
                                </label>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 120px; top: 440px;">
                                <input class="egov-tool-field-rect" id="N51_P1" maxlength="16" name="remarks_other_details" value="{{ old('remarks_other_details') }}" style="width: 160px; height: 17px; font-size: 10px; text-align: left; line-height: 19px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 365px; top: 422px;">
                                <input class="egov-tool-field-rect" id="N52_P1" maxlength="2" name="insurance_card_attached" value="{{ old('insurance_card_attached') }}" style="width: 49px; height: 14px; font-size: 10px; text-align: right; line-height: 21px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 365px; top: 438px;">
                                <input class="egov-tool-field-rect" id="N53_P1" maxlength="2" name="insurance_card_irrepayable" value="{{ old('insurance_card_irrepayable') }}" style="width: 49px; height: 14px; font-size: 10px; text-align: right; line-height: 21px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin egovuiForm-checkbox-wrapper" style="left: 477px; top: 408px;">
                                <input id="N54_P1" name="over_70_applicable_flg" type="checkbox" value="1" <?php echo (old('over_70_applicable_flg') == '1') ? 'checked' : ''; ?>/>
                                <label class="egovuiForm-label" for="N54_P1" style="font-size: 12px;">
                                </label>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 557px; top: 433px;">
                                <select class="egov-tool-field-rect" id="N56_P1" name="over_70_non_applicable_date_era" style="width: 37px; height: 26px; font-size: 9px; text-align: left; line-height: 30px; padding: inherit; background-color:rgb(255, 255, 0); letter-spacing: -1.5px;">
                                    <option value="" {{ old('over_70_non_applicable_date_era') == '' ? 'selected' : '' }}>
                                    </option>
                                    <option value="7" {{ old('over_70_non_applicable_date_era') == '7' ? 'selected' : '' }}>
                                    平成
                                    </option>
                                    <option value="9" {{ old('over_70_non_applicable_date_era') == '9' ? 'selected' : '' }}>
                                    令和
                                    </option>
                                </select>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 598px; top: 433px;">
                                <input class="egov-tool-field-rect" id="N57_P1" name="over_70_non_applicable_date_year" value="{{ old('over_70_non_applicable_date_year') }}" onfocus="addlength(this,2)" style="width: 42px; height: 26px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 643px; top: 433px;">
                                <input class="egov-tool-field-rect" id="N58_P1" name="over_70_non_applicable_date_month" value="{{ old('over_70_non_applicable_date_month') }}" onfocus="addlength(this,2)" style="width: 42px; height: 26px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 690px; top: 433px;">
                                <input class="egov-tool-field-rect" id="N59_P1" name="over_70_non_applicable_date_day" value="{{ old('over_70_non_applicable_date_day') }}" onfocus="addlength(this,2)" style="width: 42px; height: 26px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:rgb(255, 255, 0);" type="text"/>
                            </div>
                            <div class="ledger-container">
                                <img alt="法令様式画像" src="{{ $dataUri }}" /> 
                            </div>
                        </div>
                    </form>
                </div>
                <script>
                    var monitoredInputsForN37_P1_0 = ['N39_P1', 'N40_P1', 'N41_P1', 'N42_P1'];
                    var monitoredInputsForN37_P1_1 = ['N44_P1', 'N45_P1', 'N46_P1', 'N47_P1'];
                    var monitoredInputsForN54_P1 = ['N56_P1', 'N57_P1', 'N58_P1', 'N59_P1'];
                    var monitoredInputsForN51_P1 = ['N51_P1'];

                    function addEventListenerForCheck(elementIds, targetCheckboxId) {
                        elementIds.forEach(function(elementId) {
                            var element = document.getElementById(elementId);
                            element.addEventListener('blur', function() {
                                var allInputsEmpty = true;
                                var targetCheckbox = document.getElementById(targetCheckboxId);
                                elementIds.forEach(function(id) {
                                    var inputElement = document.getElementById(id);
                                    if (inputElement.value.trim() !== '') {
                                        allInputsEmpty = false;
                                    }
                                });
                                if (!allInputsEmpty) {
                                    targetCheckbox.checked = true;
                                } else {
                                    targetCheckbox.checked = false;
                                }
                            });
                        });
                    }

                    addEventListenerForCheck(monitoredInputsForN37_P1_0, 'N37_P1_0');
                    addEventListenerForCheck(monitoredInputsForN37_P1_1, 'N37_P1_1');
                    addEventListenerForCheck(monitoredInputsForN54_P1, 'N54_P1');
                    addEventListenerForCheck(monitoredInputsForN51_P1, 'N50_P1');
                    
                </script>
                <script>
                    function addlength(ele,ml){
                        var tmp = ele.getAttribute("maxlength");
                        
                        if( tmp == null){
                        ele.setAttribute("maxlength", ml);
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</div>

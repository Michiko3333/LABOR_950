        <div class="egovui-application-form-input-area">
            <div id="eGovForm">
                <style>
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
                        border: 0.1rem solid #1042A4 !important;
                        border-radius: 0.3rem;
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

                    .egovuiForm-preview-style input {
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

                    .egovuiForm-preview-style input:focus {
                        outline: 0;
                        border: 0.1rem solid #1042A4 !important;
                        border-radius: 0.3rem;
                    }

                    .egovuiForm-preview-style input::-webkit-input-placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style input::-moz-placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style input:-ms-input-placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style input::-ms-input-placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style input::placeholder {
                        color: #C6C9D3;
                    }

                    .egovuiForm-preview-style input[readonly] {
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

                    .egovuiForm-preview-style select {
                        cursor: pointer;
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

                    .egovuiForm-wrap-radio-wrapper,

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
                    .egovuiForm-preview-standard-style input {
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
                    .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single input {
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
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-linked-object input,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-linked-object select,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-unlinked-object input[type="text"],
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-unlinked-object input,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-unlinked-object select {
                        background-color: #FFEACB !important;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover {
                        cursor: pointer;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-linked-object input[type="text"],
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-linked-object input,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-linked-object select,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-unlinked-object input[type="text"],
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-unlinked-object input,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-unlinked-object select {
                        background-color: #FFF2DE !important;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-linked-object input[type="text"],
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-linked-object input,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-linked-object select {
                        border: 0.2rem solid #FF7700 !important;
                        border-radius: 0 !important;
                        pointer-events: none;
                    }

                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-unlinked-object input[type="text"],
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-unlinked-object input,
                    .egovuiForm-scale-pinch-item-wrapper.egovuiForm-unlinked-object select {
                        border: 0.2rem dashed #FF7700 !important;
                        border-radius: 0 !important;
                        pointer-events: none;
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

                    body input.egovuiForm-input-error,
                    body select.egovuiForm-input-error,
                    body in.egovuiForm-input-error,
                    body div.egovuiForm-checkbox-wrapper.egovuiForm-input-error,
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
                    .legal-frame-element:hover input,
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
                    body#egovuiEditStyle .egovuiForm-main .egovuiForm-tabs-detail #event input {
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
                        .egovuiForm-preview-style.egovuiForm-preview-legal-style .egov-tool-wrapper in {
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
                            background-color:#ddeeff;
                            padding: 0px;
                            overflow: hidden;
                            border: none;
                            position: absolute;
                            border-radius: 0px;
                        }
                        .egovuiForm-preview-style.egovuiForm-preview-legal-style .egov-tool-field-rect:disabled {
                            background-color: #ffffff;
                        }
                        .ledger-container {
                            width: 100%;
                            height: auto;
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
                        .preview-area input[type="RADIO"]::before {
                            display: none;
                            border: none !important;
                        }
                        .preview-area input[type="CHECKBOX"]::before {
                            display: none;
                            border: none !important;
                        }
                    </style>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                        var dropdown = document.getElementById("N54_005F_89C1_93FC_8ED2_94D4_8D86");
                        var input = document.getElementById("N55_005F_8E73_8A4F_8BC7_94D4");

                        dropdown.addEventListener("change", function() {
                            if (dropdown.value === "その他") {
                                input.disabled = false;
                            } else {
                                input.value = "";
                                input.disabled = true;
                            }
                        });
                    });
                    </script>
                    <form class="egovuiForm-form">
                        <div class="egov-tool-wrapper">
                            <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 275.5px; top: 8.5px; width:12px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                <INPUT tabindex="48" value="1" <?php echo old('health_insurance') == '1' ? 'checked' : ''; ?> style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;" type="CHECKBOX" id="N3_005F_944E_8D86" name="health_insurance">
                                <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                    &nbsp;
                                </SPAN>
                            </SPAN>
                            <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 275.5px; top: 35.5px; width:12px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                <INPUT tabindex="48" value="1" <?php echo old('welfare_pension_insurance') == '1' ? 'checked' : ''; ?> style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;" type="CHECKBOX" id="N4_005F_944E" name="welfare_pension_insurance">
                                <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                    &nbsp;
                                </SPAN>
                            </SPAN>
                            <div class="egov-tool-field-origin" style="left: 90px; top: 65px;">
                                <input class="egov-tool-field-rect onImage" id="N5_005F_8C8E" name="input_date_japan_era_year" required="required" style="width: 26px; height: 18px; font-size: 10px; text-align: center; line-height: 22px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('input_date_japan_era_year') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 125px; top: 65px;">
                                <input class="egov-tool-field-rect onImage" id="N6_005F_93FA" name="input_date_month" required="required" style="width: 24px; height: 18px; font-size: 10px; text-align: center; line-height: 22px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('input_date_month') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 159px; top: 65px;">
                                <input class="egov-tool-field-rect onImage" id="N7_005F_944E_8D86" name="input_date_day" required="required" style="width: 24px; height: 18px; font-size: 10px; text-align: center; line-height: 22px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('input_date_day') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 159px; top: 85px;">
                                <input class="egov-tool-field-rect onImage" id="N8_005F_944E" maxlength="2" name="employee_pension_office_reference_prefecture" required="required" style="width: 32px; height: 17px; font-size: 10px; text-align: left; line-height: 22px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_pension_office_reference_prefecture') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 193.4px; top: 85px;">
                                <input class="egov-tool-field-rect onImage" id="N9_005F_8C8E" maxlength="2" name="employee_pension_office_reference_no_cities" required="required" style="width: 32px; height: 17px; font-size: 10px; text-align: left; line-height: 22px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_pension_office_reference_no_cities') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 227px; top: 85px;">
                                <input class="egov-tool-field-rect onImage" id="N10_005F_93FA" maxlength="4" name="employee_pension_office_reference_no_office" required="required" style="width: 45.5px; height: 17px; font-size: 10px; text-align: left; line-height: 22px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_pension_office_reference_no_office') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 347px; top: 85px;">
                                <input class="egov-tool-field-rect onImage" id="N11_005F_94ED_95DB_8CAF_8ED2_8E81" maxlength="5" name="branch_insurance_office_no" required="required" style="width: 103px; height: 17px; font-size: 10px; text-align: right; line-height: 22px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('branch_insurance_office_no') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 190px; top: 103px;">
                                <input class="egov-tool-field-rect onImage" id="N12_005F_905C_90BF_8ED2_8E81" maxlength="3" name="branch_post_code_first" required="required" style="width: 30px; height: 14px; font-size: 10px; text-align: center; line-height: 19px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('branch_post_code_first') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 235px; top: 103px;">
                                <input class="egov-tool-field-rect onImage" id="N13_005F_8374_838A_834B_8369" maxlength="4" name="branch_post_code_last" required="required" style="width: 42px; height: 14px; font-size: 10px; text-align: center; line-height: 19px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('branch_post_code_last') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 173px; top: 118px;">
                                <input class="egov-tool-field-rect onImage" id="N15_005F_94ED_95DB_8CAF_8ED2_8E81_96BC" maxlength="50" name="branch_address" required="required" style="width: 277px; height: 30px; font-size: 10px; text-align: left; line-height: 12px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;" value="{{ old('branch_address') }}">
                            </div>
                            <div class="egov-tool-field-origin" style="left: 173px; top: 149px;">
                                <input class="egov-tool-field-rect onImage" id="N16_005F_905C_90BF" maxlength="34" name="branch_name" required="required" style="width: 277px; height: 28px; font-size: 10px; text-align: left; line-height: 12px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;" value="{{ old('branch_name') }}">
                            </div>
                            <div class="egov-tool-field-origin" style="left: 173px; top: 178px;">
                                <input class="egov-tool-field-rect onImage" id="N17_005F_985A_8F5C_8DCE_82C9" maxlength="25" name="company_representative" required="required" style="width: 277px; height: 28px; font-size: 10px; text-align: left; line-height: 12px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;" value="{{ old('company_representative') }}">
                            </div>
                            <div class="egov-tool-field-origin" style="left: 190px; top: 209.5px;">
                                <input class="egov-tool-field-rect onImage" id="N18_005F_8CC2_906C_94D4" maxlength="5" name="branch_tel_area_code" required="required" style="width: 50px; height: 20px; font-size: 10px; text-align: center; line-height: 23px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('branch_tel_area_code') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 258px; top: 209.5px;">
                                <input class="egov-tool-field-rect onImage" id="N19_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85" maxlength="4" name="branch_tel_city_code" required="required" style="width: 46px; height: 20px; font-size: 10px; text-align: center; line-height: 23px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('branch_tel_city_code') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 320px; top: 209.5px;">
                                <input class="egov-tool-field-rect onImage" id="N20_005F_94ED_95DB_8CAF_8ED2_94D4_8D866" maxlength="5" name="branch_tel_subscriber_code" required="required" style="width: 60px; height: 20px; font-size: 10px; text-align: center; line-height: 23px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('branch_tel_subscriber_code') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 457px; top: 208px;">
                                <input class="egov-tool-field-rect onImage" id="N21_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD" maxlength="40" name="labor_consultant_acting_as_agent" style="width: 277px; height: 22px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;" value="{{ old('labor_consultant_acting_as_agent') }}">
                            </div>
                            <div class="egov-tool-field-origin" style="left: 103px; top: 255px;">
                                <input class="egov-tool-field-rect onImage" id="N23__005F_94ED" maxlength="16" name="employee_name_kana" required="required" style="width: 328px; height: 27px; font-size: 12px; text-align: left; line-height: 39px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_name_kana') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 103px; top: 284px;">
                                <input class="egov-tool-field-rect onImage" id="N24_005F_8E96_8BC6" maxlength="12" name="employee_name" required="required" style="width: 328px; height: 28px; font-size: 12px; text-align: left; line-height: 42px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_name') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 435px; top: 270px;">
                                <select class="egov-tool-field-rect onImage" id="N25_005F_8E96_8BC6_8F8A" name="employee_birthday_japan_era" required="required" style="width: 44px; height: 24px; font-size: 10px; text-align: left; line-height: 24px; padding: inherit; background-color:#ddeeff;">
                                    <option selected="" value="5" {{ old('employee_birthday_japan_era') == '5' ? 'selected' : '' }}>
                                    昭和
                                    </option>
                                    <option value="7" {{ old('employee_birthday_japan_era') == '7' ? 'selected' : '' }} >
                                    平成
                                    </option>
                                    <option value="9" {{ old('employee_birthday_japan_era') == '9' ? 'selected' : '' }} >
                                    令和
                                    </option>
                                </select>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 482px; top: 270px;">
                                <input class="egov-tool-field-rect onImage" id="N26_005F_8E96_8BC6_8F8A_94D4" name="employee_birthday_japan_era_year" required="required" style="width: 40px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_birthday_japan_era_year') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 525.5px; top: 270px;">
                                <input class="egov-tool-field-rect onImage" id="N28_8D864_8C85" name="employee_birthday_month" required="required" style="width: 40px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_birthday_month') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 569px; top: 270px;">
                                <input class="egov-tool-field-rect onImage" id="N29_005F_8E73" name="employee_birthday_day" required="required" style="width: 40px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_birthday_day') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 611.8px; top: 270px;">
                                <select class="egov-tool-field-rect onImage" id="N30_93E0_8BC7_94D4" name="insured_person_type" required="required" style="width: 123px; height: 30px; font-size: 12px; text-align: left; line-height: 30px; padding: inherit; background-color:#ddeeff;">
                                    <option selected="" value="1" {{ old('insured_person_type') == '1' ? 'selected' : '' }}>
                                    男
                                    </option>
                                    <option value="5" {{ old('insured_person_type') == '5' ? 'selected' : '' }}>
                                    男（基金）
                                    </option>
                                    <option value="2" {{ old('insured_person_type') == '2' ? 'selected' : '' }}>
                                    女
                                    </option>
                                    <option value="6" {{ old('insured_person_type') == '6' ? 'selected' : '' }}>
                                    女（基金）
                                    </option>
                                    <option value="3" {{ old('insured_person_type') == '3' ? 'selected' : '' }}>
                                    坑内員
                                    </option>
                                    <option value="7" {{ old('insured_person_type') == '7' ? 'selected' : '' }}>
                                    坑内員（基金）
                                    </option>
                                </select>
                            </div>
                            <div class="egov-tool-field-origin egovuiForm-radio-wrapper" style="position: absolute; left: 71px; top: 336px; height:15px; background-color:#ddeeff;">
                                <input checked="" id="N31_005F_89C1_93FC" name="employee_insured_type" required="required" type="radio" value="1" <?php echo (old('employee_insured_type') == '1') ? 'checked' : ''; ?>/>
                                <label class="egovuiForm-label" for="employee_insured_type_1" style="font-size: 10px;">
                                </label>
                            </div>
                            <div class="egov-tool-field-origin egovuiForm-radio-wrapper" style="position: absolute; left: 126px; top: 336px; height:15px; background-color:#ddeeff;">
                                <input id="N33_005F_8E73_8A4F" name="employee_insured_type" required="required" type="radio" value="3" <?php echo (old('employee_insured_type') == '3') ? 'checked' : ''; ?>/>
                                <label class="egovuiForm-label" for="employee_insured_type_3" style="font-size: 10px;">
                                </label>
                            </div>
                            <div class="egov-tool-field-origin egovuiForm-radio-wrapper" style="position: absolute; left: 71px; top: 357px; height:15px; background-color:#ddeeff;">
                                <input id="N34_93E0_8BC7_94D4" name="employee_insured_type" required="required" type="radio" value="4" <?php echo (old('employee_insured_type') == '4') ? 'checked' : ''; ?>/>
                                <label class="egovuiForm-label" for="employee_insured_type_4" style="font-size: 10px;">
                                </label>
                            </div>
                            <div class="egov-tool-field-origin egovuiForm-radio-wrapper" style="position: absolute; left: 126px; top: 357px; height:15px; background-color:#ddeeff;">
                                <input id="N35_94D4_8D86" name="employee_insured_type" required="required" type="radio" value="0" <?php echo (old('employee_insured_type') == '0') ? 'checked' : ''; ?>/>
                                <label class="egovuiForm-label" for="employee_insured_type_0" style="font-size: 10px;">
                                </label>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 185px; top: 334px;">
                                <input class="egov-tool-field-rect onImage" id="N36_005F_8E96_8BC6_8F8A" maxlength="12" name="employee_mynumber_card_no" style="width: 247px; height: 44px; font-size: 12px; text-align: left; line-height: 70px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_mynumber_card_no') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 435px; top: 345px;">
                                <select class="egov-tool-field-rect onImage" id="N37_96BC_005F_8F8A_8DDD_926E" name="employee_employment_insured_date_japan_era" required="required" style="width: 44px; height: 24px; font-size: 10px; text-align: left; line-height: 24px; padding: inherit; background-color:#ddeeff;">
                                    <option selected="" value="7" {{ old('employee_employment_insured_date_japan_era') == '7' ? 'selected' : '' }}>
                                    平成
                                    </option>
                                    <option value="9" {{ old('employee_employment_insured_date_japan_era') == '9' ? 'selected' : '' }}>
                                    令和
                                    </option>
                                </select>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 482px; top: 342px;">
                                <input class="egov-tool-field-rect onImage" id="N38_8F8A_96BC_005F_8F8A_8DDD_926E" name="employee_employment_insured_date_japan_era_year" required="required" style="width: 41px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_employment_insured_date_japan_era_year') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 525px; top: 342px;">
                                <input class="egov-tool-field-rect onImage" id="N39_005F_905C_90BF" name="employee_employment_insured_date_month" required="required" style="width: 41px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_employment_insured_date_month') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 568px; top: 342px;">
                                <input class="egov-tool-field-rect onImage" id="N40_905C_90BF_8ED2" name="employee_employment_insured_date_day" required="required" style="width: 41px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_employment_insured_date_day') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 611.8px; top: 342px;">
                                <select class="egov-tool-field-rect onImage" id="N41_005F_96BC_8FCC" name="employee_dependent_flg" required="required" style="width: 123px; height: 30px; font-size: 12px; text-align: left; line-height: 30px; padding: inherit; background-color:#ddeeff;">
                                    <option selected="" value="無" {{ old('employee_dependent_flg') == '無' ? 'selected' : '' }}>
                                    無
                                    </option>
                                    <option value="有" {{ old('employee_dependent_flg') == '有' ? 'selected' : '' }}>
                                    有
                                    </option>
                                </select>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 68.5px; top: 417px;">
                                <input class="egov-tool-field-rect onImage" id="N42_005F_8F8A_8DDD_926E" maxlength="7" name="monthly_remuneration_all" required="required" style="width: 94px; height: 24px; font-size: 12px; text-align: right; line-height: 35px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('monthly_remuneration_all') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 173px; top: 417px;">
                                <input class="egov-tool-field-rect onImage" id="N43_947A_9242_8BC7_94D4" maxlength="7" name="monthly_remuneration_part" style="width: 94px; height: 24px; font-size: 12px; text-align: right; line-height: 35px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('monthly_remuneration_part') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 278px; top: 417px;">
                                <input class="egov-tool-field-rect onImage" id="N44_005F_92AC_88E6" maxlength="7" name="monthly_remuneration_total" required="required" style="width: 94px; height: 24px; font-size: 12px; text-align: right; line-height: 35px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('monthly_remuneration_total') }}"/>
                            </div>

                            <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 405px; top: 394px; width:12px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                <INPUT tabindex="48" value="1" <?php echo old('note_over_70_years_old') == '1' ? 'checked' : ''; ?> style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;" type="CHECKBOX" id="N45__005F_8E73_8A4F_8BC7_94D4" name="note_over_70_years_old">
                                <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                    &nbsp;
                                </SPAN>
                            </SPAN>
                            <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 405px; top: 409.5px; width:12px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                <INPUT tabindex="48" value="1" <?php echo old('note_multiple_office_workers') == '1' ? 'checked' : ''; ?> style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;" type="CHECKBOX" id="N46__005F_8E73_93E0_8BC7_94D4" name="note_multiple_office_workers">
                                <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                    &nbsp;
                                </SPAN>
                            </SPAN>
                            <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 405px; top: 426px; width:12px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                <INPUT tabindex="48" value="1" <?php echo old('note_short_time_work') == '1' ? 'checked' : ''; ?> style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;" type="CHECKBOX" id="N47_005F_89C1_93FC_8ED2_94D4_8D86" name="note_short_time_work">
                                <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                    &nbsp;
                                </SPAN>
                            </SPAN>
                            <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 521px; top: 393.5px; width:12px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                <INPUT tabindex="48" value="1" <?php echo old('note_continued_reemployment_after_retirement') == '1' ? 'checked' : ''; ?> style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;" type="CHECKBOX" id="N48_005F_8E73_8A4F_8BC7" name="note_continued_reemployment_after_retirement">
                                <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                    &nbsp;
                                </SPAN>
                            </SPAN>
                            <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 521px; top: 409.5px; width:12px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                <INPUT tabindex="48" value="1" <?php echo old('note_others') == '1' ? 'checked' : ''; ?> style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;" type="CHECKBOX" id="N49_005F_8E73_8A4F_8BC8" name="note_others">
                                <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                    &nbsp;
                                </SPAN>
                            </SPAN>
                            <div class="egov-tool-field-origin" style="left: 562px; top: 408px;">
                                <input class="egov-tool-field-rect onImage" id="N50_005F_8E73_8A4F_8BC9" maxlength="10" name="note_others_in" style="width: 106px; height: 18px; font-size: 10px; text-align: left; line-height: 21px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('note_others_in') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 175px; top: 443px;">
                                <input class="egov-tool-field-rect onImage" id="N51_005F_8E73_8A4F_8BC7" maxlength="3" name="employee_post_code_first" style="width: 30px; height: 13px; font-size: 10px; text-align: center; line-height: 19px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_post_code_first') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 230px; top: 443px;">
                                <input class="egov-tool-field-rect onImage" id="N52_005F_8E73_8A4F" maxlength="4" name="employee_post_code_last" style="width: 42px; height: 13px; font-size: 10px; text-align: center; line-height: 19px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('employee_post_code_last') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 168px; top: 457px;">
                                <input class="egov-tool-field-rect onImage" id="N53_005F_8E73_93E0" maxlength="37" name="employee_address" style="width: 373px; height: 26px; font-size: 10px; text-align: left; line-height: 12px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;" value="{{ old('employee_address') }}"/>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 603.5px; top: 443.5px;">
                                <select class="egov-tool-field-rect onImage" id="N54_005F_89C1_93FC_8ED2_94D4_8D86" name="acquisition_reason" style="width: 131px; height: 20px; font-size: 12px; text-align: left; line-height: 20px; padding: inherit; background-color:#ddeeff;">
                                    <option value="" {{ old('acquisition_reason') == '' ? 'selected' : '' }}>
                                    </option>
                                    <option value="海外在住" {{ old('acquisition_reason') == '海外在住' ? 'selected' : '' }}>
                                    海外在住
                                    </option>
                                    <option value="短期在留" {{ old('acquisition_reason') == '短期在留' ? 'selected' : '' }}>
                                    短期在留
                                    </option>
                                    <option value="その他" {{ old('acquisition_reason') == 'その他' ? 'selected' : '' }}>
                                    その他
                                    </option>
                                </select>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 658px; top: 466.5px;">
                                <input class="egov-tool-field-rect onImage" id="N55_005F_8E73_8A4F_8BC7_94D4" maxlength="7" name="other_acquisition_reason" style="width: 70px; height: 16px; font-size: 10px; text-align: left; line-height: 10px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('other_acquisition_reason') }}"/>
                            </div>
                            <div class="ledger-container">
                                <img alt="法令様式画像" src="{{ $dataUri }}">    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

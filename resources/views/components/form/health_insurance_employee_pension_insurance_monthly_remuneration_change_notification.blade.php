<div>
                        <div id="eGovForm">
                            <style>
                                @charset "UTF-8";

                                /* Button */

                                .egovuiForm-preview-legal-style {
                                    margin-top: 3.2rem;
                                }

                                _:-ms-lang(x)::-ms-backdrop,
                                html {
                                    font-size: 10px !important;
                                }

                                /* IEでpointer-events:noneが効かないため、z-indexの調整で触れないようにしておく */
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

                                /* range全体 */
                                _:-ms-lang(x)::-ms-backdrop,
                                .egovuiForm-preview-style input[type="range"] {
                                    height: auto !important;
                                    width: 9.6rem !important;
                                    margin: 1.5rem 0.1rem 0 0.1rem !important;
                                    cursor: pointer !important;
                                }

                                /* 溝のスタイル */
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

                                /* 溝の色（つまみより左側） */
                                _:-ms-lang(x)::-ms-backdrop,
                                .egovuiForm-preview-style input[type=range]::-ms-fill-lower {
                                    border: 0.1rem solid #9E9E9E !important;
                                }

                                /* 溝の色（つまみより右側） */
                                _:-ms-lang(x)::-ms-backdrop,
                                .egovuiForm-preview-style input[type=range]::-ms-fill-upper {
                                    border: 0.1rem solid #9E9E9E !important;
                                }

                                /* つまみのスタイル */
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

                                /* ポップアップを非表示にする */
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

                                /* range全体 */
                                _:-ms-lang(x)::backdrop,
                                .egovuiForm-preview-style input[type="range"] {
                                    height: auto !important;
                                    width: 9.6rem !important;
                                    margin: 0 0.1rem 0 0.1rem !important;
                                    cursor: pointer !important;
                                }

                                /* 溝のスタイル */
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

                                /* 溝の色（つまみより左側） */
                                _:-ms-lang(x)::backdrop,
                                .egovuiForm-preview-style input[type=range]::-ms-fill-lower {
                                    border: 0.1rem solid #9E9E9E !important;
                                }

                                /* 溝の色（つまみより右側） */
                                _:-ms-lang(x)::backdrop,
                                .egovuiForm-preview-style input[type=range]::-ms-fill-upper {
                                    border: 0.1rem solid #9E9E9E !important;
                                }

                                /* つまみのスタイル */
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

                                /* Edgeはバグでfocus時に背景色が変更出来ないため、クラスを付与して明示的にする */
                                _:-ms-lang(x)::backdrop,
                                .egovuiForm-preview-style input[type="range"].egovuiForm-radio-focus-edge::-ms-thumb {
                                    background-color: #DFE1E8 !important;
                                    outline: none !important;
                                }

                                /* ポップアップを非表示にする */
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
                                .egovuiForm-preview-style input[type="text"] {/*ここ*/
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

                                /* Utility */
                                .egovuiForm-flex-stretch {
                                    flex-grow: 1 !important;
                                }

                                .egovuiForm-align-items-start {
                                    align-items: flex-start !important;
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

                                .egovuiForm-disabled-style .egovuiForm-checkbox-wrapper .egovuiForm-label {
                                    cursor: default !important;
                                }

                                .egovuiForm-disabled-style .egovuiForm-checkbox-wrapper .egovuiForm-label::before {
                                    cursor: default !important;
                                }

                                .egovuiForm-disabled-style .egovuiForm-checkbox-wrapper input[type="checkbox"]:checked~.egovuiForm-label::after {
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

                                /* text link */
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

                                .egovuiForm-preview-style textarea {/*ここ*/
                                    width: 100%;
                                    min-height: 4.8rem;
                                    resize: none;
                                    padding: 0.4rem 0.9rem;
                                    border: 0.1rem solid #C6C9D3;
                                    border-radius: 0.3rem;
                                    background-color: blue;
                                    color: inherit;
                                    font-size: 1.2rem;
                                    font-family: inherit;
                                }

                                .egovuiForm-preview-style textarea:focus {/*ここ*/
                                    outline: 0;
                                    border: 0.1rem solid #1042A4 !important;
                                    border-radius: 0.3rem;
                                }

                                .egovuiForm-preview-style textarea::-webkit-input-placeholder {/*ここ*/
                                    color: #C6C9D3;
                                }

                                .egovuiForm-preview-style textarea::-moz-placeholder {/*ここ*/
                                    color: #C6C9D3;
                                }

                                .egovuiForm-preview-style textarea:-ms-input-placeholder {/*ここ*/
                                    color: #C6C9D3;
                                }

                                .egovuiForm-preview-style textarea::-ms-input-placeholder {/*ここ*/
                                    color: #C6C9D3;
                                }

                                .egovuiForm-preview-style textarea::placeholder {/*ここ*/
                                    color: #C6C9D3;
                                }

                                .egovuiForm-preview-style textarea[readonly] {/*ここ*/
                                    border-color: #D7D7D7;
                                    background: transparent;
                                }

                                /* 3点リーダー */
                                .egovuiForm-text-3point-leader {
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;
                                }

                                /* calendar */
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

                                /* range */
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

                                .egovuiForm-radio-wrapper {
                                    position: relative;
                                    min-height: 2.4rem;
                                    margin-right: 2rem;
                                }

                                .egovuiForm-radio-wrapper .egovuiForm-label {
                                    display: inline-block;
                                    padding-left: 2rem;
                                    line-height: 2.4rem;
                                    cursor: pointer;
                                }

                                .egovuiForm-radio-wrapper .egovuiForm-label::before {
                                    position: absolute;
                                    display: block;
                                    top: 0.4rem;
                                    bottom: 0;
                                    left: 0;
                                    width: 0.9rem;
                                    height: 0.9rem;
                                    content: "";
                                    -webkit-user-select: none;
                                    -moz-user-select: none;
                                    -ms-user-select: none;
                                    user-select: none;
                                    border: 0.1rem solid #DADADA;
                                    background-color: #FFFFFF;
                                    border-radius: 100%;
                                    box-sizing: border-box;
                                    cursor: pointer;
                                }

                                .egovuiForm-radio-wrapper input[type="radio"] {
                                    position: absolute;
                                    z-index: -1;
                                    height: 1.6rem;
                                    width: 1.6rem;
                                    margin: 0;
                                    margin-top: 0.4rem;
                                    opacity: 0;
                                }

                                .egovuiForm-radio-wrapper input[type="radio"]:focus~.egovuiForm-label::before {
                                    border: 0.1rem solid #1042A4 !important;
                                }

                                .egovuiForm-radio-wrapper input[type="radio"]:checked~.egovuiForm-label::after {
                                    content: "";
                                    position: absolute;
                                    display: block;
                                    top: 0.6rem;
                                    bottom: 0;
                                    left: 0.21rem;
                                    width: 0.5rem;
                                    height: 0.5rem;
                                    background-color: #1042A4;
                                    border-radius: 100%;
                                    box-sizing: border-box;
                                    cursor: pointer;
                                }

                                .egovuiForm-radio-wrapper input[type="radio"]:disabled+.egovuiForm-label::before,
                                .egovuiForm-radio-wrapper input[type="radio"]:disabled+.egovuiForm-label::after {
                                    cursor: default !important;
                                }

                                .egovuiForm-radio-wrapper.egovuiForm-radio-wrapper-big {
                                    min-height: 2.8rem;
                                    margin-right: 4rem;
                                }

                                .egovuiForm-radio-wrapper.egovuiForm-radio-wrapper-big .egovuiForm-label {
                                    padding-left: 3rem;
                                    line-height: 2.8rem;
                                }

                                .egovuiForm-radio-wrapper.egovuiForm-radio-wrapper-big .egovuiForm-label::before {
                                    top: 0.4rem;
                                    width: 2rem;
                                    height: 2rem;
                                }

                                .egovuiForm-radio-wrapper.egovuiForm-radio-wrapper-big input[type="radio"] {
                                    height: 2rem;
                                    width: 2rem;
                                    margin-top: 0.4rem;
                                }

                                .egovuiForm-radio-wrapper.egovuiForm-radio-wrapper-big input[type="radio"]:checked~.egovuiForm-label::after {
                                    top: 0.9rem;
                                    left: 0.5rem;
                                    width: 1rem;
                                    height: 1rem;
                                }

                                .egovuiForm-radio-wrapper .egovuiForm-radio-error {
                                    position: absolute;
                                    left: -0.4rem;
                                    height: 2.4rem;
                                    width: 9.2rem;
                                    background-color: #FFEBEB;
                                    z-index: -10;
                                }

                                .egovuiForm-checkbox-wrapper {
                                    position: relative;
                                    min-height: 2.4rem;
                                    margin-right: 2rem;
                                }

                                .egovuiForm-checkbox-wrapper .egovuiForm-label {
                                    display: inline-block;
                                    padding-left: 2.2rem;
                                    line-height: 2.4rem;
                                    cursor: pointer;
                                }

                                .egovuiForm-checkbox-wrapper .egovuiForm-label::before {
                                    display: block;
                                    position: absolute;
                                    top: 0.3rem;
                                    left: 0;
                                    width: 0.8rem;
                                    height: 0.8rem;
                                    box-sizing: border-box;
                                    content: "";
                                    -webkit-user-select: none;
                                    -moz-user-select: none;
                                    -ms-user-select: none;
                                    user-select: none;
                                    border: 0.1rem solid #C6C9D3;
                                    background-color: #FFFFFF;
                                    border-radius: 0.2rem;
                                    cursor: pointer;
                                }

                                .egovuiForm-checkbox-wrapper input[type="checkbox"] {
                                    position: absolute;
                                    z-index: -1;
                                    height: 1.8rem;
                                    width: 1.8rem;
                                    margin: 0;
                                    margin-top: 0.3rem;
                                    opacity: 0;
                                }

                                .egovuiForm-checkbox-wrapper input[type="checkbox"]:disabled+.egovuiForm-label::before {
                                    cursor: default;
                                }

                                .egovuiForm-checkbox-wrapper input[type="checkbox"]:focus~.egovuiForm-label::before {
                                    border: 0.1rem solid #1042A4 !important;
                                }

                                .egovuiForm-checkbox-wrapper input[type="checkbox"]:checked~.egovuiForm-label::after {
                                    content: "";
                                    display: block;
                                    position: absolute;
                                    top: 0.3rem;
                                    bottom: 0;
                                    left: 0;
                                    width: 1.8rem;
                                    height: 1.8rem;
                                    box-sizing: border-box;
                                    pointer-events: none;
                                    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMy42NzYiIGhlaWdodD0iMTEuNzI2IiB2aWV3Qm94PSIwIDAgMTMuNjc2IDExLjcyNiI+CiAgICAgICAgPHBhdGggaWQ9IuODkeOCuV84NTYiIGRhdGEtbmFtZT0i44OR44K5IDg1NiIgZD0iTTk1MC44NTUsNDQ0LjE2Nmw0LjQsNC45NTcsNy42LTkuMzMzIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtOTUwLjAzMiAtNDM5LjA5NCkiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzEwNDJhNCIgc3Ryb2tlLXdpZHRoPSIyLjIiLz4KICAgICAgPC9zdmc+");
                                    background-repeat: no-repeat;
                                    background-size: 0.7rem 0.5rem;
                                    background-position: 0.05rem 0.1rem;
                                }

                                .egovuiForm-checkbox-wrapper input[type="checkbox"]:focus {
                                    outline: 0;
                                    border: 0.1rem solid #1042A4 !important;
                                    border-radius: 0.2rem;
                                }

                                .egovuiForm-checkbox-wrapper.egovuiForm-checkbox-wrapper-big {
                                    min-height: 2.8rem;
                                    margin-right: 4rem;
                                }

                                .egovuiForm-checkbox-wrapper.egovuiForm-checkbox-wrapper-big .egovuiForm-label {
                                    padding-left: 3.4rem;
                                    line-height: 2.8rem;
                                }

                                .egovuiForm-checkbox-wrapper.egovuiForm-checkbox-wrapper-big .egovuiForm-label::before {
                                    top: 0.2rem;
                                    width: 2.4rem;
                                    height: 2.4rem;
                                }

                                .egovuiForm-checkbox-wrapper.egovuiForm-checkbox-wrapper-big input[type="checkbox"] {
                                    height: 2.4rem;
                                    width: 2.4rem;
                                    margin-top: 0.2rem;
                                }

                                .egovuiForm-checkbox-wrapper.egovuiForm-checkbox-wrapper-big input[type="checkbox"]:checked~.egovuiForm-label::after {
                                    top: 0.2rem;
                                    width: 2.4rem;
                                    height: 2.4rem;
                                    background-image: url("../img/icon-checkbox-big.svg");
                                    background-size: 1.4rem 1.2rem;
                                    background-position: 0.6rem 0.6rem;
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

                                /* table */
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

                                .egovuiForm-table thead th .egovuiForm-checkbox-wrapper .egovuiForm-label::before,
                                .egovuiForm-dialog-table thead th .egovuiForm-checkbox-wrapper .egovuiForm-label::before {
                                    left: 1rem;
                                }

                                .egovuiForm-table thead th .egovuiForm-checkbox-wrapper input[type="checkbox"]:checked~.egovuiForm-label::after,
                                .egovuiForm-dialog-table thead th .egovuiForm-checkbox-wrapper input[type="checkbox"]:checked~.egovuiForm-label::after {
                                    left: 1rem;
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

                                .egovuiForm-table tbody td .egovuiForm-checkbox-wrapper .egovuiForm-label::before,
                                .egovuiForm-dialog-table tbody td .egovuiForm-checkbox-wrapper .egovuiForm-label::before {
                                    left: 0.6rem;
                                }

                                .egovuiForm-table tbody td .egovuiForm-checkbox-wrapper input[type="checkbox"]:checked~.egovuiForm-label::after,
                                .egovuiForm-dialog-table tbody td .egovuiForm-checkbox-wrapper input[type="checkbox"]:checked~.egovuiForm-label::after {
                                    left: 0.6rem;
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

                                /* tab */
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

                                /* heading */
                                .egovuiForm-h3 {
                                    line-height: 2.1rem;
                                    font-size: 1.4rem;
                                    font-weight: bold;
                                }

                                /* header */
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

                                /* form */
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

                                /* Tree */
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

                                /* dialog */
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
                                    /* 編集破棄ダイアログ共通 */
                                    /* エラー喚起ダイアログ共通 */
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

                                .egovuiForm-dialog .egovuiForm-contents-wrapper .egovuiForm-dialog-footer button {
                                    min-width: 12rem;
                                }

                                /* main */
                                .egovuiForm-main {
                                    flex: 1;
                                    max-height: calc(100% - 3.3rem);
                                }

                                /* nav menu */
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

                                /* button footer */
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

                                /* パネルサイズ変更バー */
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
                                .egovuiForm-wrap-checkbox-wrapper {
                                    margin-top: -0.4rem !important;
                                }

                                .egovuiForm-wrap-radio-wrapper .egovuiForm-radio-wrapper,
                                .egovuiForm-wrap-radio-wrapper .egovuiForm-checkbox-wrapper,
                                .egovuiForm-wrap-checkbox-wrapper .egovuiForm-radio-wrapper,
                                .egovuiForm-wrap-checkbox-wrapper .egovuiForm-checkbox-wrapper {
                                    margin-top: 0.4rem !important;
                                }

                                .egovuiForm-wrap-radio-wrapper.egovuiForm-wrap-radio-wrapper-big,
                                .egovuiForm-wrap-radio-wrapper.egovuiForm-wrap-checkbox-wrapper-big,
                                .egovuiForm-wrap-checkbox-wrapper.egovuiForm-wrap-radio-wrapper-big,
                                .egovuiForm-wrap-checkbox-wrapper.egovuiForm-wrap-checkbox-wrapper-big {
                                    margin-top: -1rem !important;
                                }

                                .egovuiForm-wrap-radio-wrapper.egovuiForm-wrap-radio-wrapper-big .egovuiForm-radio-wrapper-big,
                                .egovuiForm-wrap-radio-wrapper.egovuiForm-wrap-radio-wrapper-big .egovuiForm-checkbox-wrapper-big,
                                .egovuiForm-wrap-radio-wrapper.egovuiForm-wrap-checkbox-wrapper-big .egovuiForm-radio-wrapper-big,
                                .egovuiForm-wrap-radio-wrapper.egovuiForm-wrap-checkbox-wrapper-big .egovuiForm-checkbox-wrapper-big,
                                .egovuiForm-wrap-checkbox-wrapper.egovuiForm-wrap-radio-wrapper-big .egovuiForm-radio-wrapper-big,
                                .egovuiForm-wrap-checkbox-wrapper.egovuiForm-wrap-radio-wrapper-big .egovuiForm-checkbox-wrapper-big,
                                .egovuiForm-wrap-checkbox-wrapper.egovuiForm-wrap-checkbox-wrapper-big .egovuiForm-radio-wrapper-big,
                                .egovuiForm-wrap-checkbox-wrapper.egovuiForm-wrap-checkbox-wrapper-big .egovuiForm-checkbox-wrapper-big {
                                    margin-top: 1rem !important;
                                }

                                /* jQuery ui datepicker スタイル上書き */
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
                                .egovuiForm-preview-standard-style textarea {/*ここ*/
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
                                .egovuiForm-preview-standard-style.egovuiForm-preview-standard-style-single textarea {/*ここ*/
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

                                /* badge */
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

                                /* Label */
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

                                /* 状態毎のオブジェクトスタイル */
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
                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-linked-object textarea,/*ここ*/
                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-linked-object select,
                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-unlinked-object input[type="text"],
                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-unlinked-object textarea,/*ここ*/
                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-selected.egovuiForm-unlinked-object select {
                                    background-color: #FFEACB !important;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover {
                                    cursor: pointer;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-linked-object input[type="text"],
                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-linked-object textarea,/*ここ*/
                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-linked-object select,
                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-unlinked-object input[type="text"],
                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-unlinked-object textarea,/*ここ*/
                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-scale-pinch-item-hover.egovuiForm-unlinked-object select {
                                    background-color: #FFF2DE !important;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-linked-object input[type="text"],
                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-linked-object textarea,/*ここ*/
                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-linked-object select {
                                    border: 0.2rem solid #FF7700 !important;
                                    border-radius: 0 !important;
                                    pointer-events: none;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-unlinked-object input[type="text"],
                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-unlinked-object textarea,/*ここ*/
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

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-checkbox-wrapper.egovuiForm-linked-object .egovuiForm-label {
                                    pointer-events: none;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-checkbox-wrapper.egovuiForm-linked-object .egovuiForm-label::before {
                                    border: 0.2rem solid #FF7700;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-checkbox-wrapper.egovuiForm-unlinked-object .egovuiForm-label {
                                    pointer-events: none;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-checkbox-wrapper.egovuiForm-unlinked-object .egovuiForm-label::before {
                                    border: 0.2rem dashed #FF7700;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-checkbox-wrapper.egovuiForm-scale-pinch-item-selected .egovuiForm-label::before {
                                    background-color: #FFEACB;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-checkbox-wrapper.egovuiForm-scale-pinch-item-hover .egovuiForm-label::before {
                                    background-color: #FFF2DE !important;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-checkbox-wrapper .egovuiForm-scale-pinch-checkbox-wrapper {
                                    position: absolute;
                                    top: 0.3rem;
                                    left: 0;
                                    height: 1.8rem;
                                    width: 1.8rem;
                                    cursor: pointer;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-checkbox-wrapper .egovuiForm-scale-pinch {
                                    height: 0.6rem;
                                    width: 0.6rem;
                                    background-color: #FF7700;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-checkbox-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-top-left {
                                    top: -0.2rem;
                                    left: -0.2rem;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-checkbox-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-top-right {
                                    top: -0.2rem;
                                    right: -0.2rem;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-checkbox-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-bottom-right {
                                    bottom: -0.2rem;
                                    right: -0.2rem;
                                }

                                .egovuiForm-scale-pinch-item-wrapper.egovuiForm-checkbox-wrapper .egovuiForm-scale-pinch.egovuiForm-scale-pinch-bottom-left {
                                    bottom: -0.2rem;
                                    left: -0.2rem;
                                }

                                /* マスキング */
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

                                /* warningメッセージエリア */
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

                                /* スピナー */
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
                                .flip-list-move {
                                transition: transform 0.3s;
                                }
                                .fade-enter-active, .fade-leave-active {
                                transition: opacity 0.3s;
                                }
                                .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
                                opacity: 0;
                                }

                                a[href].link-decoration:hover{
                                text-decoration: underline;
                                }

                                body input.egovuiForm-input-error,
                                body select.egovuiForm-input-error,
                                body textarea.egovuiForm-input-error,/*ここ*/
                                body div.egovuiForm-checkbox-wrapper.egovuiForm-input-error,
                                body div.egovuiForm-radio-wrapper.egovuiForm-input-error  {
                                background-color: #FFEBEB;
                                border: 1px solid #EED4D4;
                                }

                                .egovuiForm-disabled-style .egovuiForm-disabled-style {
                                opacity: initial !important;
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
                                .legal-frame-element:hover textarea,/*ここ*/
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
                                    .egovuiForm-preview-style.egovuiForm-preview-legal-style .egov-tool-wrapper textarea {/*ここ*/
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
                                    max-width: 762px;
                                    min-width: 762px;
                                    }
                                    .egovuiForm-preview-style.egovuiForm-preview-legal-style select{
                                    min-height: 10px;
                                    min-width: 10px;
                                    }
                                    .preview-area input[type="CHECKBOX"]::before {
                                        display: none;
                                    }
                                </style>
                                <form class="egovuiForm-form">
                                    <div class="egov-tool-wrapper">
                                        <div class="egov-tool-field-origin" style="left: 82px; top: 60px;">
                                            <input class="egov-tool-field-rect onImage" id="N4_005F_944E" name="today_year" onfocus="addlength(this,2)" required="required" style="width: 22px; height: 18px; font-size: 10px; text-align: center; line-height: 23px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 112px; top: 60px;">
                                            <input class="egov-tool-field-rect onImage" id="N5_005F_8C8E" name="today_month" onfocus="addlength(this,2)" required="required" style="width: 22px; height: 18px; font-size: 10px; text-align: center; line-height: 23px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 142px; top: 60px;">
                                            <input class="egov-tool-field-rect onImage" id="N6_005F_93FA" name="today_date" onfocus="addlength(this,2)" required="required" style="width: 22px; height: 18px; font-size: 10px; text-align: center; line-height: 23px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 144px; top: 80px;">
                                            <input class="egov-tool-field-rect onImage" id="N7_005F_944E_8D86" maxlength="2" value="{{ old('pension_office_reference_prefecture') }}" name="pension_office_reference_prefecture" required="required" style="width: 50px; height: 25px; font-size: 10px; text-align: left; line-height: 38px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 195.5px; top: 80px;">
                                            <input class="egov-tool-field-rect onImage" id="N8_005F_944E" maxlength="4" value="{{ old('pension_office_reference_no_cities') }}" name="pension_office_reference_no_cities" required="required" style="width: 50px; height: 25px; font-size: 10px; text-align: left; line-height: 38px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 246.5px; top: 80px;">
                                            <input class="egov-tool-field-rect onImage" id="N9_005F_8C8E" maxlength="4" value="{{ old('pension_office_reference_no_office') }}" name="pension_office_reference_no_office" required="required" style="width: 50px; height: 25px; font-size: 10px; text-align: left; line-height: 38px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 154px; top: 106px;">
                                            <input class="egov-tool-field-rect onImage" id="N10_005F_93FA" maxlength="3" value="{{ old('branch_post_code_parent') }}" name="branch_post_code_parent" required="required" style="width: 40px; height: 17px; font-size: 10px; text-align: center; line-height: 18px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 218px; top: 106px;">
                                            <input class="egov-tool-field-rect onImage" id="N11_005F_94ED_95DB_8CAF_8ED2_8E81" maxlength="4" value="{{ old('branch_post_code_child') }}" name="branch_post_code_child" required="required" style="width: 45px; height: 17px; font-size: 10px; text-align: center; line-height: 18px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 135px; top: 124px;">
                                            <input class="egov-tool-field-rect onImage" id="N12_005F_905C_90BF_8ED2_8E81" maxlength="70" value="{{ old('branch_address') }}" name="branch_address" required="required" style="width: 253px; height: 27px; font-size: 10px; text-align: left; line-height: 12px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 135px; top: 152px;">
                                            <input class="egov-tool-field-rect onImage" id="N13_005F_8374_838A_834B_8369" maxlength="50" value="{{ old('branch_name') }}" name="branch_name" required="required" style="width: 253px; height: 27px; font-size: 10px; text-align: left; line-height: 12px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 135px; top: 180px;">
                                            <input class="egov-tool-field-rect onImage" id="N15_005F_94ED_95DB_8CAF_8ED2_8E81_96BC" maxlength="25" value="{{ old('employer_company_managerial_position_name') }}" name="employer_company_managerial_position_name" required="required" style="width: 253px; height: 27px; font-size: 10px; text-align: left; line-height: 12px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 135px; top: 208px;">
                                            <input class="egov-tool-field-rect onImage" id="N16_005F_905C_90BF" maxlength="5" value="{{ old('branch_tel_area_code') }}" name="branch_tel_area_code" required="required" style="width: 66px; height: 19px; font-size: 10px; text-align: center; line-height: 23px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 206px; top: 208px;">
                                            <input class="egov-tool-field-rect onImage" id="N17_005F_985A_8F5C_8DCE_82C9" maxlength="4" value="{{ old('branch_tel_city_code') }}" name="branch_tel_city_code" required="required" style="width: 65px; height: 19px; font-size: 10px; text-align: center; line-height: 19px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 284px; top: 208px;">
                                            <input class="egov-tool-field-rect onImage" id="N18_005F_8CC2_906C_94D4" maxlength="5" value="{{ old('branch_tel_subscriber_code') }}" name="branch_tel_subscriber_code" required="required" style="width: 66px; height: 19px; font-size: 10px; text-align: center; line-height: 19px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 398.3px; top: 193px;">
                                            <input class="egov-tool-field-rect onImage" id="N19_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85" maxlength="40" value="{{ old('labor_consultant_submission_agent_name') }}" name="labor_consultant_submission_agent_name" style="width: 293.5px; height: 34px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 62px; top: 267px;">
                                            <input class="egov-tool-field-rect onImage" id="N20_005F_94ED_95DB_8CAF_8ED2_94D4_8D866" value="{{ old('insurer_reference_no') }}" name="insurer_reference_no" onfocus="addlength(this,6)" style="width: 55px; height: 40px; font-size: 12px; text-align: right; line-height: 62px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 149px; top: 267.5px;">
                                            <input class="egov-tool-field-rect onImage" id="N21_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD" maxlength="25" value="{{ old('insured_fullname_kana') }}" name="insured_fullname_kana" required="required" style="width: 166px; height: 19px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 119px; top: 288px;">
                                            <input class="egov-tool-field-rect onImage" id="N23__005F_94ED" maxlength="12" value="{{ old('insured_fullname') }}" name="insured_fullname" required="required" style="width: 196px; height: 19px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 317px; top: 272px;">
                                            <select class="egov-tool-field-rect onImage" id="N24_005F_8E96_8BC6" value="{{ old('birthday_era') }}" name="birthday_era" required="required" style="width: 46px; height: 30px; font-size: 12px; text-align: left; line-height: 30px; padding: inherit; background-color:#ddeeff;">
                                                <option value="1">
                                                明治
                                                </option>
                                                <option value="3">
                                                大正
                                                </option>
                                                <option selected="" value="5">
                                                昭和
                                                </option>
                                                <option value="7">
                                                平成
                                                </option>
                                                <option value="9">
                                                令和
                                                </option>
                                            </select>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 365.5px; top: 277px;">
                                            <input class="egov-tool-field-rect onImage" id="N25_005F_8E96_8BC6_8F8A" value="{{ old('birthday_year') }}" name="birthday_year" onfocus="addlength(this,2)" required="required" style="width: 26px; height: 24px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 393.5px; top: 277px;">
                                            <input class="egov-tool-field-rect onImage" id="N26_005F_8E96_8BC6_8F8A_94D4" value="{{ old('birthday_month') }}" name="birthday_month" onfocus="addlength(this,2)" required="required" style="width: 26px; height: 24px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 422.5px; top: 277px;">
                                            <input class="egov-tool-field-rect onImage" id="N28_8D864_8C85" value="{{ old('birthday_date') }}" name="birthday_date" onfocus="addlength(this,2)" required="required" style="width: 26px; height: 24px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 450px; top: 272px;">
                                            <select class="egov-tool-field-rect onImage" id="N29_005F_8E73" value="{{ old('revision_date_era') }}" name="revision_date_era" required="required" style="width: 46px; height: 30px; font-size: 12px; text-align: left; line-height: 30px; padding: inherit; background-color:#ddeeff;">
                                                <option selected="" value="7">
                                                平成
                                                </option>
                                                <option value="9">
                                                令和
                                                </option>
                                            </select>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 498.8px; top: 277px;">
                                            <input class="egov-tool-field-rect onImage" id="N30_93E0_8BC7_94D4" value="{{ old('revision_date_year') }}" name="revision_date_year" onfocus="addlength(this,2)" required="required" style="width: 26px; height: 24px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 527.5px; top: 277px;">
                                            <input class="egov-tool-field-rect onImage" id="N31__005F_89C1_93FC" value="{{ old('revision_date_month') }}" name="revision_date_month" onfocus="addlength(this,2)" required="required" style="width: 26px; height: 24px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 76px; top: 327px;">
                                            <input class="egov-tool-field-rect onImage" id="N33_005F_8E73_8A4F" maxlength="4" value="{{ old('previous_average_monthly_salary_health_insurance') }}" name="previous_average_monthly_salary_health_insurance" style="width: 44px; height: 16px; font-size: 10px; text-align: right; line-height: 24px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 153px; top: 327px;">
                                            <input class="egov-tool-field-rect onImage" id="N34_93E0_8BC7_94D4" maxlength="4" value="{{ old('previous_average_monthly_salary_pension') }}" name="previous_average_monthly_salary_pension" style="width: 44px; height: 16px; font-size: 10px; text-align: right; line-height: 24px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 216px; top: 327px;">
                                            <input class="egov-tool-field-rect onImage" id="N35_94D4_8D86" value="{{ old('before_revision_date_year') }}" name="before_revision_date_year" onfocus="addlength(this,2)" style="width: 34px; height: 16px; font-size: 10px; text-align: center; line-height: 24px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 260px; top: 327px;">
                                            <input class="egov-tool-field-rect onImage" id="N36_005F_8E96_8BC6_8F8A" value="{{ old('before_revision_date_month') }}" name="before_revision_date_month" onfocus="addlength(this,2)" style="width: 34px; height: 16px; font-size: 10px; text-align: center; line-height: 24px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 306px; top: 327px;">
                                            <input class="egov-tool-field-rect onImage" id="N37_96BC_005F_8F8A_8DDD_926E" value="{{ old('salary_raise_and_reduction_month') }}" name="salary_raise_and_reduction_month" onfocus="addlength(this,2)" style="width: 34px; height: 16px; font-size: 10px; text-align: center; line-height: 24px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 350px; top: 326.8px;">
                                            <select class="egov-tool-field-rect onImage" id="N38_8F8A_96BC_005F_8F8A_8DDD_926E" value="{{ old('salary_raise_and_reduction') }}" name="salary_raise_and_reduction" required="required" style="width: 70px; height: 15px; font-size: 10px; text-align: left; line-height: 15px; padding: inherit; background-color:#ddeeff;">
                                                <option selected="" value="昇給">
                                                昇給
                                                </option>
                                                <option value="降給">
                                                降給
                                                </option>
                                            </select>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 422px; top: 327px;">
                                            <input class="egov-tool-field-rect onImage" id="N39_005F_905C_90BF" value="{{ old('retroactive_payment_month') }}" name="retroactive_payment_month" onfocus="addlength(this,2)" style="width: 34px; height: 16px; font-size: 10px; text-align: center; line-height: 24px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 468px; top: 327px;">
                                            <input class="egov-tool-field-rect onImage" id="N40_905C_90BF_8ED2" maxlength="7" value="{{ old('retroactive_payment_amount') }}" name="retroactive_payment_amount" style="width: 51px; height: 16px; font-size: 10px; text-align: right; line-height: 24px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 63px; top: 388.5px;">
                                            <input class="egov-tool-field-rect onImage" id="N41_005F_96BC_8FCC" value="{{ old('salary_payment_month1') }}" name="salary_payment_month1" onfocus="addlength(this,2)" required="required" style="width: 29px; height: 16px; font-size: 10px; text-align: center; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 63px; top: 406px;">
                                            <input class="egov-tool-field-rect onImage" id="N42_005F_8F8A_8DDD_926E" value="{{ old('salary_payment_month2') }}" name="salary_payment_month2" onfocus="addlength(this,2)" required="required" style="width: 29px; height: 16px; font-size: 10px; text-align: center; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 63px; top: 424px;">
                                            <input class="egov-tool-field-rect onImage" id="N43_947A_9242_8BC7_94D4" value="{{ old('salary_payment_month3') }}" name="salary_payment_month3" onfocus="addlength(this,2)" required="required" style="width: 29px; height: 16px; font-size: 10px; text-align: center; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 101px; top: 388.5px;">
                                            <input class="egov-tool-field-rect onImage" id="N44_005F_92AC_88E6" value="{{ old('salary_calculation_basic_days1') }}" name="salary_calculation_basic_days1" onfocus="addlength(this,2)" required="required" style="width: 39px; height: 16px; font-size: 10px; text-align: center; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 101px; top: 406px;">
                                            <input class="egov-tool-field-rect onImage" id="N45__005F_8E73_8A4F_8BC7_94D4" value="{{ old('salary_calculation_basic_days2') }}" name="salary_calculation_basic_days2" onfocus="addlength(this,2)" required="required" style="width: 39px; height: 16px; font-size: 10px; text-align: center; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 101px; top: 424px;">
                                            <input class="egov-tool-field-rect onImage" id="N46__005F_8E73_93E0_8BC7_94D4" value="{{ old('salary_calculation_basic_days3') }}" name="salary_calculation_basic_days3" onfocus="addlength(this,2)" required="required" style="width: 39px; height: 16px; font-size: 10px; text-align: center; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 148px; top: 388px;">
                                            <input class="egov-tool-field-rect onImage" id="N47_005F_89C1_93FC_8ED2_94D4_8D86" maxlength="7" value="{{ old('monthly_salary_currency1') }}" name="monthly_salary_currency1" required="required" style="width: 60px; height: 16px; font-size: 10px; text-align: right; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 148px; top: 406px;">
                                            <input class="egov-tool-field-rect onImage" id="N48_005F_8E73_8A4F_8BC7" maxlength="7" value="{{ old('monthly_salary_currency2') }}" name="monthly_salary_currency2" required="required" style="width: 60px; height: 16px; font-size: 10px; text-align: right; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 148px; top: 424px;">
                                            <input class="egov-tool-field-rect onImage" id="N49_005F_8E73_8A4F_8BC8" maxlength="7" value="{{ old('monthly_salary_currency3') }}" name="monthly_salary_currency3" required="required" style="width: 60px; height: 16px; font-size: 10px; text-align: right; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 220px; top: 388px;">
                                            <input class="egov-tool-field-rect onImage" id="N50_005F_8E73_8A4F_8BC9" maxlength="7" value="{{ old('monthly_salary_in_kind1') }}" name="monthly_salary_in_kind1" style="width: 60px; height: 16px; font-size: 10px; text-align: right; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 220px; top: 406px;">
                                            <input class="egov-tool-field-rect onImage" id="N51_005F_8E73_8A4F_8BC7" maxlength="7" value="{{ old('monthly_salary_in_kind2') }}" name="monthly_salary_in_kind2" style="width: 60px; height: 16px; font-size: 10px; text-align: right; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 220px; top: 424px;">
                                            <input class="egov-tool-field-rect onImage" id="N52_005F_8E73_8A4F" maxlength="7" value="{{ old('monthly_salary_in_kind3') }}" name="monthly_salary_in_kind3" style="width: 60px; height: 16px; font-size: 10px; text-align: right; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 291px; top: 388px;">
                                            <input class="egov-tool-field-rect onImage" id="N53_005F_8E73_93E0" maxlength="7" value="{{ old('monthly_salary_sum1') }}" name="monthly_salary_sum1" required="required" style="width: 60px; height: 16px; font-size: 10px; text-align: right; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 291px; top: 406px;">
                                            <input class="egov-tool-field-rect onImage" id="N54_005F_89C1_93FC_8ED2_94D4_8D86" maxlength="7" value="{{ old('monthly_salary_sum2') }}" name="monthly_salary_sum2" required="required" style="width: 60px; height: 16px; font-size: 10px; text-align: right; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 291px; top: 424px;">
                                            <input class="egov-tool-field-rect onImage" id="N55_005F_8E73_8A4F_8BC7_94D4" maxlength="7" value="{{ old('monthly_salary_sum3') }}" name="monthly_salary_sum3" required="required" style="width: 60px; height: 16px; font-size: 10px; text-align: right; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 430px; top: 388px;">
                                            <input class="egov-tool-field-rect onImage" id="N56_005F_8E73_8A4F_8BC7_94D7" maxlength="7" value="{{ old('sum') }}" name="sum" required="required" style="width: 92px; height: 16px; font-size: 10px; text-align: right; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 430px; top: 406px;">
                                            <input class="egov-tool-field-rect onImage" id="N57_005F_8E73_8A4F_8BC7_94D9" maxlength="7" value="{{ old('average_amount') }}" name="average_amount" required="required" style="width: 92px; height: 16px; font-size: 10px; text-align: right; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 430px; top: 424px;">
                                            <input class="egov-tool-field-rect onImage" id="N58_005F_8E73_8A4F_8BC7_9410" maxlength="7" value="{{ old('adjusted_average_amount') }}" name="adjusted_average_amount" style="width: 92px; height: 16px; font-size: 10px; text-align: right; line-height: 25px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 555px; top: 267px;">
                                            <input class="egov-tool-field-rect onImage" id="N59_005F_8E73_8A4F_8BC7_9412" maxlength="12" value="{{ old('mynumber_no_or_pension_no') }}" name="mynumber_no_or_pension_no" style="width: 142px; height: 40px; font-size: 12px; text-align: left; line-height: 62px; padding: inherit; background-color:#ddeeff;" type="text" value=""/>
                                        </div>

                                        <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 533px; top: 326px; width: 13px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                            <INPUT tabindex="48" value="1" <?php echo old('remarks_over_70_monthly_salary_change') == '1' ? 'checked' : ''; ?> style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;" type="CHECKBOX" id="N60_005F_8E73_8A4F_8BC7_9432" name="remarks_over_70_monthly_salary_change">
                                            <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                                &nbsp;
                                            </SPAN>
                                        </SPAN>
                                        <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 533px; top: 339.5px; width:13px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                            <INPUT tabindex="48" value="1" <?php echo old('remarks_multi_work') == '1' ? 'checked' : ''; ?> style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;" type="CHECKBOX" id="N61_005F_8E73_8A4F_8BC7_94DD" name="remarks_multi_work">
                                            <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                                &nbsp;
                                            </SPAN>
                                        </SPAN>
                                        <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 533px; top: 353px; width:13px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                            <INPUT tabindex="48" value="1" <?php echo old('remarks_part_time_workers') == '1' ? 'checked' : ''; ?> style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;" type="CHECKBOX" id="N62_005F_8E73_8A4F_8BC7_94DC" name="remarks_part_time_workers">
                                            <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                                &nbsp;
                                            </SPAN>
                                        </SPAN>
                                        <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 533px; top: 367.5px; width:13px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                            <INPUT tabindex="48" value="1" <?php echo old('remarks_salary_raise_and_reduction_reasons') == '1' ? 'checked' : ''; ?> style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;" type="CHECKBOX" id="N63_005F_8E73_8A4F_8BC7_9467" name="remarks_salary_raise_and_reduction_reasons">
                                            <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                                &nbsp;
                                            </SPAN>
                                        </SPAN>
                                        <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 533px; top: 397px; width:13px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                            <INPUT tabindex="48" value="1" <?php echo old('remarks_only_health_insurance_salary_change') == '1' ? 'checked' : ''; ?> style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;" type="CHECKBOX" id="N64_005F_8F5A_8F8A" name="remarks_only_health_insurance_salary_change">
                                            <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                                &nbsp;
                                            </SPAN>
                                        </SPAN>
                                        <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 533px; top: 426px; width:13px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                            <INPUT tabindex="48" value="1" <?php echo old('remarks_and_others') == '1' ? 'checked' : ''; ?> style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;" type="CHECKBOX" id="N65_005F_8F5A_8F8B" name="remarks_and_others">
                                            <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                                &nbsp;
                                            </SPAN>
                                        </SPAN>
                                        <div class="egov-tool-field-origin" style="left: 552px; top: 381px;">
                                            <input class="egov-tool-field-rect onImage" id="remarks_salary_raise_and_reduction_reasons_text" maxlength="13" name="remarks_salary_raise_and_reduction_reasons_text" style="width: 125px; height: 16px; font-size: 10px; text-align: left; line-height: 24px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('remarks_salary_raise_and_reduction_reasons_text') }}"/>
                                        </div>
                                        <div class="egov-tool-field-origin" style="left: 576px; top: 423px;">
                                            <input class="egov-tool-field-rect onImage" id="remarks_others" maxlength="10" name="remarks_others" style="width: 101px; height: 16px; font-size: 10px; text-align: left; line-height: 24px; padding: inherit; background-color:#ddeeff;" type="text" value="{{ old('remarks_others') }}"/>
                                        </div>
                                        <img alt="法令様式画像" src="{{ $dataUri }}"/>
                                    </div>
                                </form>
                            </div>


                            <script>
                                function addlength(ele,ml){
                                    var tmp = ele.getAttribute("maxlength");
                                    
                                    if( tmp == null){
                                    ele.setAttribute("maxlength", ml);
                                    }
                                }
                                document.addEventListener("DOMContentLoaded", function() {
                                    var c1_0 = document.getElementById("N60_005F_8E73_8A4F_8BC7_9432");
                                    var c1_1 = document.getElementById("N61_005F_8E73_8A4F_8BC7_94DD");
                                    var c1_2 = document.getElementById("N62_005F_8E73_8A4F_8BC7_94DC");
                                    var c1_3 = document.getElementById("N63_005F_8E73_8A4F_8BC7_9467");
                                    var c1_4 = document.getElementById("N64_005F_8F5A_8F8A");
                                    var c1_5 = document.getElementById("N65_005F_8F5A_8F8B");
                                    var remarks1 = document.getElementById("remarks_salary_raise_and_reduction_reasons_text");
                                    var remarks2 = document.getElementById("remarks_others");
                                    c1_0.addEventListener("change", function() {
                                        if (c1_0.checked) {
                                            c1_1.checked = false;
                                            c1_2.checked = false;
                                            c1_3.checked = false;
                                            c1_4.checked = false;
                                            c1_5.checked = false;
                                            remarks1.value = "";
                                            remarks2.value = "";
                                            remarks1.disabled = true;
                                            remarks2.disabled = true;
                                        }
                                    });
                                    c1_1.addEventListener("change", function() {
                                        if (c1_1.checked) {
                                            c1_0.checked = false;
                                            c1_2.checked = false;
                                            c1_3.checked = false;
                                            c1_4.checked = false;
                                            c1_5.checked = false;
                                            remarks1.value = "";
                                            remarks2.value = "";
                                            remarks1.disabled = true;
                                            remarks2.disabled = true;
                                        }
                                    });
                                    c1_2.addEventListener("change", function() {
                                        if (c1_2.checked) {
                                            c1_1.checked = false;
                                            c1_0.checked = false;
                                            c1_3.checked = false;
                                            c1_4.checked = false;
                                            c1_5.checked = false;
                                            remarks1.value = "";
                                            remarks2.value = "";
                                            remarks1.disabled = true;
                                            remarks2.disabled = true;
                                        }
                                    });
                                    c1_3.addEventListener("change", function() {
                                        if (c1_3.checked) {
                                            c1_1.checked = false;
                                            c1_2.checked = false;
                                            c1_0.checked = false;
                                            c1_4.checked = false;
                                            c1_5.checked = false;
                                            remarks2.value = "";
                                            remarks2.disabled = true;
                                            remarks1.disabled = false;
                                        }
                                    });
                                    c1_4.addEventListener("change", function() {
                                        if (c1_4.checked) {
                                            c1_1.checked = false;
                                            c1_0.checked = false;
                                            c1_3.checked = false;
                                            c1_0.checked = false;
                                            c1_5.checked = false;
                                            remarks1.value = "";
                                            remarks2.value = "";
                                            remarks1.disabled = true;
                                            remarks2.disabled = true;
                                        }
                                    });
                                    c1_5.addEventListener("change", function() {
                                        if (c1_5.checked) {
                                            c1_1.checked = false;
                                            c1_2.checked = false;
                                            c1_0.checked = false;
                                            c1_4.checked = false;
                                            c1_3.checked = false;
                                            remarks1.value = "";
                                            remarks1.disabled = true;
                                            remarks2.disabled = false;
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>

<?php

if (!defined('ABSPATH')) exit;

add_filter('block_categories_all', 'buss_block_categories', 10, 2);
function buss_block_categories($block_categories, $editor_context)
{
    if (!empty($editor_context->post)) {
        array_push(
            $block_categories,
            array(
                'slug' => 'buss',
                'title' => __('Buss', 'buss'),
                'icon' => null,
            )
        );
    }
    return $block_categories;
}

add_action('acf/init', 'buss_acf_init_blocks');
function buss_acf_init_blocks()
{
    if ( ! function_exists( 'acf_register_block' ) ) {
        return;
    }


    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="136" height="177" viewBox="0 0 136 177" fill="none">
        <g clip-path="url(#clip0_261_10116)">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M69.9266 1.39968C69.7605 1.40063 69.6141 1.40148 69.5113 1.40148V0.00465609C69.6097 0.00465609 69.7509 0.00384377 69.9174 0.00288575L70.013 0.00233923C70.2195 0.00117457 70.4539 0 70.6805 0C71.5054 0 72.1733 0.54524 72.4137 1.27769L72.414 1.27864L72.4143 1.27959C74.6292 8.09459 81.504 13.3002 92.6037 15.5278C99.098 16.831 104.324 16.1665 108.365 14.2942L108.366 14.2935L108.368 14.2928C109.002 14.0023 109.761 14.0705 110.33 14.502C113.077 16.5835 115.12 18.4205 116.424 19.6023L116.425 19.6031L116.426 19.6039C127.068 29.3104 132.608 40.0531 135.387 46.7455L135.387 46.7467C135.548 47.1359 135.428 47.5307 135.342 47.7524C135.241 48.0115 135.088 48.2729 134.937 48.5015C134.684 48.8849 134.378 49.2634 134.196 49.489C134.161 49.5325 134.13 49.5704 134.106 49.6014C132.982 51.0189 130.269 54.7332 128.837 61.8762C128.397 64.0756 128.173 66.3295 128.219 68.5648C128.327 73.7614 129.588 77.8412 130.61 81.1467C130.984 82.3564 131.326 83.4624 131.568 84.4816C131.667 84.8975 131.764 85.3026 131.859 85.6981C132.726 89.3151 133.403 92.1407 133.662 95.3172C133.951 98.8537 133.722 102.801 132.713 108.784C131.624 115.255 127.424 126.122 121.648 135.023L121.648 135.023C115.849 143.957 109.388 149.695 104.206 154.191C97.6849 159.852 91.1517 164.001 84.9194 167.959L84.4337 168.268C84.4336 168.268 84.4336 168.268 84.4335 168.268C80.8348 170.555 73.8951 174.553 71.1606 176.026C70.6394 176.309 70.0163 176.318 69.4825 176.035C68.9562 175.757 67.9659 175.278 66.7345 174.682C65.8287 174.244 64.7924 173.743 63.7145 173.212C61.1997 171.974 58.4695 170.583 56.799 169.531L56.7989 169.531C50.3617 165.477 43.6243 161.23 36.8371 155.457L36.8366 155.457C32.6617 151.898 25.2339 145.481 18.4901 135.246L18.49 135.246C12.7923 126.594 10.2761 119.312 7.37128 110.892C4.77342 103.4 1.82422 93.0616 0.0116044 80.3127L0.0114436 80.3115L0.0112864 80.3104C-0.11467 79.4031 0.463199 78.473 1.42051 78.2699L1.42097 78.2698C3.30564 77.8712 6.74514 76.7748 9.43815 73.6563C13.9271 68.4264 12.5522 61.8455 12.3173 60.804C11.3673 56.6586 8.8 53.9623 7.24195 52.3368L7.24062 52.3354L7.23929 52.334C5.71661 50.7279 4.17018 49.5853 2.91157 48.7891C2.17572 48.3236 1.88142 47.4029 2.21966 46.5986C5.02198 39.9058 10.6053 29.1539 21.3648 19.4431L21.3654 19.4426L21.366 19.4421C22.6663 18.2737 24.6952 16.4697 27.409 14.4304L27.4105 14.4294L27.4119 14.4283C27.9868 14.0008 28.7554 13.9207 29.4048 14.2177C33.4185 16.0315 38.5859 16.6588 44.9826 15.3696L44.9831 15.3695C56.084 13.1398 62.9228 8.1294 65.14 1.32563C65.3663 0.629146 65.9941 0.083817 66.7881 0.0518275C67.4419 0.023348 68.0977 0.0139682 68.763 0.0139682V1.41079C68.1099 1.41079 67.4754 1.42002 66.8482 1.44737L66.8467 1.44743L66.8452 1.44749C66.6956 1.45339 66.5386 1.55919 66.4749 1.75578L66.4747 1.75623L66.4746 1.75669C64.0337 9.24695 56.5991 14.4612 45.261 16.7387C38.6289 18.0753 33.1525 17.4458 28.8231 15.4888L28.8213 15.488L28.8196 15.4872C28.6374 15.4036 28.416 15.4258 28.2527 15.5465C25.5894 17.5479 23.5971 19.319 22.3067 20.4784C11.7501 30.0061 6.26818 40.5597 3.5144 47.1367L3.51415 47.1373L3.51389 47.1379C3.44092 47.3113 3.50208 47.5077 3.66403 47.6102C4.99596 48.4527 6.63853 49.6656 8.25818 51.3737C8.25867 51.3742 8.25915 51.3748 8.25964 51.3753L8.26355 51.3793C9.83075 53.0143 12.6444 55.9496 13.6855 60.4947L13.6857 60.4958L13.686 60.4969C13.9286 61.5722 15.4699 68.7797 10.5042 74.5644L10.5036 74.5652L10.5029 74.5659C7.52802 78.0115 3.74737 79.2058 1.71295 79.636C1.52938 79.675 1.36851 79.8805 1.40098 80.1181C3.19879 92.7623 6.12336 103.012 8.69788 110.438L8.69805 110.438L8.69823 110.439C11.602 118.855 14.0712 125.988 19.6634 134.48C26.2949 144.545 33.5986 150.858 37.7485 154.395C44.4493 160.095 51.1061 164.293 57.5488 168.351C59.1474 169.357 61.8119 170.717 64.3364 171.96C65.379 172.473 66.4001 172.967 67.3038 173.405C68.5635 174.014 69.595 174.514 70.1387 174.8L70.1404 174.801L70.1422 174.802C70.253 174.861 70.3765 174.861 70.4902 174.799L70.4909 174.799L70.4916 174.799C73.2016 173.338 80.113 169.357 83.6787 167.09L83.6788 167.09L84.1403 166.797C90.3866 162.83 96.8431 158.729 103.284 153.138L103.285 153.138C108.448 148.657 114.783 143.025 120.47 134.265C126.162 125.492 130.277 114.802 131.33 108.553L131.33 108.552C132.327 102.634 132.54 98.8104 132.264 95.4303C132.014 92.3665 131.362 89.6474 130.491 86.0091C130.397 85.6184 130.301 85.2172 130.202 84.8038L130.202 84.8035L130.202 84.8031C129.989 83.9032 129.671 82.8757 129.314 81.7216C128.285 78.391 126.929 74.0064 126.816 68.5937V68.5934C126.768 66.2473 127.003 63.8919 127.461 61.6031L127.461 61.6028C128.947 54.192 131.78 50.2797 133.005 48.7354L133.005 48.7351L133.005 48.7347C133.038 48.6934 133.075 48.6474 133.115 48.5975C133.301 48.3678 133.553 48.0552 133.764 47.7348C133.893 47.5397 133.985 47.3728 134.034 47.2471C134.043 47.2243 134.049 47.2057 134.054 47.1911C131.311 40.608 125.873 30.1146 115.478 20.6338C114.182 19.4597 112.176 17.6563 109.48 15.6135L109.48 15.6132L109.479 15.6129C109.337 15.505 109.134 15.4801 108.955 15.5614C104.596 17.5808 99.0572 18.2477 92.3265 16.8971C80.9686 14.6177 73.5138 9.19846 71.0797 1.71047C71.0112 1.50308 70.8469 1.39682 70.6805 1.39682C70.4582 1.39682 70.2272 1.39797 70.021 1.39914L69.9266 1.39968ZM134.064 47.1467C134.065 47.1466 134.064 47.1483 134.064 47.1519C134.064 47.1486 134.064 47.1468 134.064 47.1467Z" fill="#FF3A1D"/>
        <path d="M68.7676 0.712437L69.5112 0.703125" stroke="#FF3A1D" stroke-width="0.3528"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.47468 48.5908C9.08266 48.5908 9.66259 48.2277 9.90578 47.6317C14.1991 37.1881 21.1301 28.1041 29.9693 21.3528C30.6521 20.836 30.7737 19.8676 30.2545 19.1924C29.7307 18.5173 28.7626 18.3916 28.0845 18.9038C18.8104 25.9856 11.5333 35.5166 7.0389 46.463C6.7162 47.2499 7.09502 48.1532 7.89008 48.4744C8.08183 48.5536 8.28293 48.5908 8.47468 48.5908Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M106.687 21.227C115.47 27.9085 122.444 36.9692 126.863 47.4407C127.116 48.0274 127.691 48.3859 128.29 48.3859C128.491 48.3859 128.696 48.344 128.893 48.2648C129.679 47.9296 130.053 47.031 129.721 46.2441C125.095 35.279 117.776 25.7853 108.572 18.7779C107.889 18.2565 106.917 18.3915 106.402 19.062C105.878 19.7464 106.014 20.7149 106.687 21.227Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M93.8349 21.6879C106.635 28.0853 116.761 39.8139 121.61 53.852C121.83 54.4899 122.434 54.8903 123.074 54.8903C123.243 54.8903 123.406 54.8624 123.579 54.8065C124.388 54.5318 124.819 53.6564 124.543 52.8509C119.356 37.8398 108.946 25.7899 95.2286 18.9315C94.4663 18.5543 93.5356 18.857 93.1521 19.6206C92.7639 20.3795 93.0679 21.3061 93.8349 21.6879Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M61.2009 16.2683C64.208 15.8726 67.276 15.7096 70.3487 15.812C72.4392 15.8772 74.5251 16.0402 76.5408 16.3056C76.6109 16.3149 76.6764 16.3195 76.7419 16.3195C77.5042 16.3195 78.173 15.7515 78.2759 14.9786C78.3881 14.1312 77.7895 13.3583 76.943 13.2512C74.8197 12.9718 72.6356 12.7995 70.4469 12.739C67.2293 12.6366 63.9695 12.8042 60.7987 13.2186C59.9475 13.335 59.3535 14.1079 59.4658 14.9507C59.5733 15.7841 60.3637 16.3801 61.2009 16.2683Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4496 52.609C12.169 53.4145 12.6039 54.2898 13.413 54.5599C13.5767 54.6157 13.7497 54.6437 13.9134 54.6437C14.5588 54.6437 15.1621 54.2433 15.3819 53.6007C20.1242 39.7815 29.735 28.5464 42.4466 21.9674C43.2089 21.5716 43.4989 20.6404 43.106 19.8861C42.7132 19.1319 41.7731 18.8385 41.0155 19.2296C27.5977 26.1811 17.4537 38.0355 12.4496 52.609Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M72.0089 168.298C56.2668 160.304 48.9289 154.107 34.0005 138.262C17.2809 120.518 13.8248 97.6053 12.6462 82.5801C12.5807 81.7327 11.8418 81.1041 10.986 81.1647C10.1348 81.2299 9.49873 81.9702 9.5642 82.8176C10.7755 98.285 15.0127 121.281 31.6153 140.218C37.0498 146.415 43.2793 152.789 51.01 158.828C59.9147 165.784 68.057 170.617 71.2325 171.171C71.761 171.264 72.2848 170.892 72.5748 170.403C73.0004 169.672 72.7525 168.727 72.0089 168.298Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M79.7907 163.679C61.4717 154.046 45.7623 141.177 39.5843 133.694C35.8943 129.22 32.6486 124.28 29.936 119.004C29.8565 118.846 29.749 118.711 29.632 118.595C29.6087 118.427 29.5619 118.26 29.4824 118.101C20.7976 100.692 19.5021 82.9898 19.5021 73.9896C19.5021 69.1333 19.8622 66.0789 19.8996 65.7437L20.0914 64.1886L20.4047 62.6334C21.3681 57.833 22.9816 53.2422 25.1984 48.9958C25.5913 48.2369 25.2966 47.3103 24.539 46.9146C23.7767 46.5235 22.8413 46.8168 22.4485 47.5757C20.096 52.0828 18.3843 56.9484 17.3648 62.0328L17.0421 63.6485L16.827 65.3759C16.7849 65.7204 16.4014 68.9471 16.4014 73.9896C16.4014 83.2645 17.7389 101.498 26.709 119.47C26.7885 119.638 26.9008 119.777 27.0224 119.903C27.0458 120.075 27.0972 120.248 27.1814 120.411C29.9875 125.881 33.3548 131.008 37.1898 135.655C43.8542 143.728 59.6384 156.574 78.3409 166.408C78.5701 166.529 78.818 166.589 79.0612 166.589C79.6177 166.589 80.1509 166.292 80.4315 165.765C80.8337 165.006 80.5437 164.075 79.7907 163.679Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M68.0801 19.8906C50.7057 19.8906 34.6503 28.5323 25.1283 43.0033C24.6606 43.7157 24.8617 44.6749 25.5773 45.1358C26.2928 45.6061 27.2516 45.4059 27.7192 44.6888C36.9372 30.6741 52.698 22.4375 69.572 22.9916C74.9596 23.1545 80.1322 24.0857 84.9446 25.7573C85.1083 25.8131 85.2767 25.8457 85.445 25.8457C85.5713 25.9528 85.7163 26.0366 85.8846 26.0972C106.537 33.7704 116.602 53.4609 117.411 69.5243C117.411 70.0504 118.641 74.6832 123.57 76.8809C123.776 76.974 123.991 77.0159 124.202 77.0159C124.791 77.0159 125.352 76.6714 125.614 76.0987C125.965 75.3258 125.609 74.4085 124.833 74.064C121.686 72.6625 120.502 69.8409 120.502 69.5243V69.4126C119.642 52.2969 108.941 31.3678 86.965 23.2057C86.7873 23.1406 86.6049 23.108 86.4318 23.1033C86.3009 22.9962 86.1419 22.9031 85.9641 22.8426C80.8524 21.0593 75.3665 20.0769 69.6655 19.9046C69.1417 19.8999 68.6085 19.8906 68.0801 19.8906Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M86.7131 159.014C78.8888 155.308 70.6576 150.768 63.5582 145.651C62.8661 145.148 61.898 145.307 61.3975 145.996C60.8971 146.685 61.0515 147.649 61.7389 148.147C68.988 153.376 77.3875 158.018 85.3802 161.803C85.5906 161.905 85.8245 161.952 86.0443 161.952C86.6242 161.952 87.1761 161.626 87.4426 161.072C87.8121 160.299 87.4847 159.382 86.7131 159.014Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M43.1813 38.5382C43.8641 38.0167 43.9857 37.0482 43.4665 36.3777C42.9427 35.698 41.9746 35.5722 41.2965 36.0937C32.6491 42.7053 26.6628 52.4226 24.446 63.4388L24.1747 64.7844L23.9877 66.2464C23.9456 66.6282 23.707 68.7141 23.6275 72.0525C23.6042 72.8999 24.2823 73.6077 25.1381 73.6263C25.1475 73.6263 25.1615 73.6263 25.1709 73.6263C26.008 73.6263 26.7002 72.9605 26.7189 72.1224C26.7984 68.8678 27.0369 66.8424 27.065 66.6236L27.2193 65.3338L27.4812 64.0488C29.553 53.7542 35.1278 44.6981 43.1813 38.5382Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M110.204 69.9482C110.222 70.2509 110.685 77.3607 115.171 80.89C117.242 82.5289 123.397 84.6335 126.255 85.8301C126.451 85.9139 126.652 85.9558 126.858 85.9558C127.461 85.9558 128.032 85.5973 128.284 85.0106C128.616 84.2284 128.242 83.3205 127.456 82.9899C124.851 81.905 118.945 79.9355 117.093 78.4735C113.702 75.8009 113.295 69.8272 113.29 69.7806C113.164 67.2151 112.79 64.6124 112.191 62.0469C112 61.2181 111.172 60.7013 110.335 60.8922C109.498 61.0877 108.983 61.9165 109.175 62.7453C109.731 65.1385 110.077 67.5597 110.204 69.9482Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M31.0866 111.811C34.1125 118.869 38.041 125.355 42.7739 131.082C46.043 135.045 50.5982 139.417 55.9391 143.724C56.2244 143.952 56.5705 144.068 56.9119 144.068C57.3655 144.068 57.8145 143.868 58.1185 143.495C58.6563 142.83 58.5534 141.857 57.8893 141.326C52.7028 137.149 48.3019 132.931 45.1638 129.127C40.6226 123.623 36.8437 117.389 33.9394 110.596C33.598 109.813 32.6954 109.45 31.905 109.781C31.1193 110.121 30.7499 111.029 31.0866 111.811Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M110.312 55.9566C105.107 42.4633 94.3549 32.5692 80.8109 28.7978C79.9878 28.5696 79.1319 29.0492 78.9028 29.8733C78.6736 30.6928 79.1553 31.5402 79.9784 31.7683C92.5684 35.2697 102.577 44.4934 107.422 57.0648C107.656 57.6747 108.245 58.0518 108.867 58.0518C109.054 58.0518 109.237 58.0192 109.419 57.9494C110.219 57.6468 110.621 56.7528 110.312 55.9566Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M69.4458 27.1076C61.4531 26.8469 53.5306 28.7699 46.651 32.5832C45.9027 32.9976 45.6361 33.9334 46.0477 34.6784C46.3283 35.1859 46.8615 35.4699 47.3993 35.4699C47.6565 35.4699 47.9138 35.4094 48.1523 35.2744C54.5408 31.7311 61.8647 29.9339 69.3429 30.1853C70.6103 30.2272 71.887 30.311 73.1357 30.4507C73.9869 30.5485 74.7539 29.9339 74.8475 29.0911C74.9457 28.2484 74.3283 27.4848 73.4818 27.387C72.1583 27.2427 70.7927 27.1495 69.4458 27.1076Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M26.8306 79.2043C26.7885 78.3523 26.0589 77.6865 25.2031 77.747C24.3519 77.7889 23.6971 78.5199 23.7392 79.3673C24.2256 88.6468 25.9373 97.5911 28.8276 105.958C29.0427 106.596 29.646 106.996 30.2914 106.996C30.4598 106.996 30.6282 106.968 30.7918 106.913C31.6056 106.633 32.0359 105.758 31.7553 104.957C28.9632 96.8601 27.3029 88.1952 26.8306 79.2043Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M93.7558 154.311C81.5634 149.152 69.6703 141.936 59.8677 133.592C59.8677 133.587 59.8677 133.587 59.863 133.587C56.1824 130.449 53.0256 127.329 50.748 124.568C45.4632 118.162 41.3382 110.712 38.4901 102.429C38.4339 102.257 38.3498 102.108 38.2422 101.977C38.2469 101.81 38.2188 101.642 38.1674 101.47C37.7558 100.222 37.3676 98.9368 37.0122 97.647C37.0075 97.6331 37.0028 97.6191 36.9982 97.6098C34.4399 88.293 33.9021 79.8655 33.9021 74.4319C33.9021 70.3578 34.2061 67.7737 34.2388 67.4943L34.3651 66.4747L34.5709 65.4596C35.076 62.95 35.829 60.5056 36.8204 58.1962V58.1915C41.9322 46.2673 53.0022 38.3148 65.7184 37.4487C65.8914 37.4348 66.0551 37.3975 66.2048 37.3323C66.3638 37.3742 66.5275 37.3975 66.7052 37.3882C67.5003 37.3556 68.3094 37.3556 69.1184 37.3789C69.6422 37.3929 70.152 37.4208 70.6618 37.4534C84.4584 38.4032 95.678 46.691 100.677 59.6116C100.682 59.6302 100.692 59.6442 100.701 59.6582C102.038 63.1363 102.815 66.7168 102.993 70.2181C102.993 70.7396 103.007 75.391 103.54 77.6585C104.377 81.1878 107.51 84.0979 109.302 85.5133C112.196 87.8041 115.699 89.8295 119.712 91.5383C119.885 91.6081 120.521 91.8735 120.694 91.9434C121.976 92.4602 123.313 92.9444 124.674 93.3867C124.693 93.396 124.712 93.4007 124.726 93.4054C125.694 93.7173 127.396 94.0991 128.2 94.3273C129.019 94.5508 129.875 94.0712 130.109 93.2517C130.338 92.4322 129.856 91.5848 129.028 91.352C128.257 91.1379 126.578 90.7654 125.628 90.4581C125.614 90.4534 125.596 90.4488 125.581 90.4441C124.309 90.0251 123.051 89.5734 121.849 89.0892C121.69 89.024 121.087 88.7726 120.923 88.7027C117.163 87.1104 113.899 85.2247 111.224 83.1061C108.703 81.1133 107.001 78.8738 106.547 76.9555C106.177 75.391 106.079 71.8664 106.079 70.1436C105.883 66.2232 105.036 62.3075 103.563 58.5035C103.558 58.4848 103.549 58.4662 103.54 58.4523C98.0865 44.4142 85.8801 35.4187 70.8676 34.3804C70.3204 34.3431 69.7685 34.3152 69.2073 34.2966C68.3281 34.2686 67.4488 34.2779 66.5789 34.3105C66.3872 34.3199 66.2141 34.3571 66.0458 34.4269C65.8774 34.3757 65.6903 34.3524 65.5079 34.3711C51.6225 35.3163 39.5423 43.9859 33.9769 56.9856C33.9723 56.9903 33.9723 56.9902 33.9723 56.9949C32.9013 59.4952 32.0782 62.1445 31.5357 64.859L31.3205 65.9346L31.1709 67.1312C31.1101 67.6201 30.8154 70.2694 30.8154 74.4412C30.8154 80.0564 31.372 88.7586 34.0097 98.392C34.0144 98.406 34.019 98.4199 34.0237 98.4293C34.3979 99.7795 34.8001 101.125 35.235 102.438C35.2865 102.615 35.3753 102.773 35.4829 102.908C35.4829 103.081 35.5109 103.258 35.5671 103.425C38.5368 112.062 42.8395 119.833 48.3628 126.529C50.7526 129.429 54.0404 132.679 57.8614 135.934C57.8614 135.934 57.8614 135.939 57.8661 135.939C67.8978 144.482 80.0809 151.876 92.5539 157.156C92.7456 157.24 92.9561 157.282 93.1525 157.282C93.7558 157.282 94.3264 156.928 94.579 156.346C94.9063 155.55 94.5415 154.642 93.7558 154.311Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M95.6777 75.0466C95.6683 78.4455 96.3418 81.2764 97.7074 83.6929C97.988 84.1724 98.5025 84.4704 99.059 84.4704C99.3209 84.4704 99.5875 84.4006 99.8167 84.2749C100.172 84.07 100.434 83.7394 100.551 83.339C100.663 82.9386 100.612 82.5289 100.406 82.1703C99.2788 80.1869 98.7737 77.9845 98.7737 75.0466C98.7737 74.4739 98.7924 73.8686 98.8345 73.1981L98.9281 71.8525L98.8579 70.4976C98.6475 66.4189 97.5437 62.247 95.659 58.4477C95.645 58.4244 95.6356 58.4011 95.6262 58.3871C93.2691 53.638 89.7522 49.5918 85.4542 46.6725C80.6464 43.4132 75.0951 41.6672 68.9732 41.4949L68.9124 41.481C68.7908 41.481 68.6645 41.481 68.5289 41.481H68.5101C67.673 41.481 66.9715 42.1607 66.9621 42.9942C66.9481 43.8416 67.6309 44.5447 68.4868 44.554C68.6224 44.5679 68.7487 44.5679 68.8796 44.5679C79.4398 44.8939 88.1667 50.4346 92.8435 59.7514C94.5693 63.1969 95.5795 66.9683 95.7665 70.6559L95.818 71.8199L95.7432 72.9979C95.7011 73.7149 95.6777 74.404 95.6777 75.0466Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M129.893 98.9694C129.678 98.6156 129.529 98.5969 129.126 98.5038C125.315 97.6425 111.233 93.8664 102.492 85.2154C101.898 84.6287 100.879 84.638 100.299 85.2247C100.004 85.5134 99.8496 85.9045 99.8496 86.3142C99.8496 86.724 100.013 87.1151 100.299 87.3991L100.322 87.4131C104.307 91.3242 109.446 94.6672 115.61 97.3351C120.334 99.3885 125.436 100.627 128.233 101.283C128.345 101.307 128.472 101.316 128.584 101.316C129.304 101.316 129.926 100.837 130.09 100.129C130.183 99.7237 130.109 99.314 129.893 98.9694Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M100.379 149.083L100.351 149.073C93.125 146.34 86.6616 143.351 79.5809 138.974C78.8701 138.532 77.8786 138.765 77.4436 139.468C77.2285 139.817 77.1537 140.232 77.2566 140.632C77.3501 141.032 77.598 141.372 77.9394 141.596C85.2913 146.126 91.7313 149.111 99.2422 151.956C99.4153 152.025 99.607 152.058 99.7894 152.058C100.425 152.058 101.005 151.658 101.235 151.057C101.529 150.279 101.15 149.404 100.379 149.083Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M63.6277 44.9217C64.044 44.8519 64.3947 44.6377 64.6426 44.2978C64.8811 43.9579 64.9747 43.5575 64.9045 43.1477C64.7689 42.3143 63.9551 41.7509 63.118 41.8813C54.4706 43.3433 46.9129 48.5907 42.3904 56.3104C40.6039 59.3648 39.3364 62.7125 38.6162 66.2698L38.4619 67.0706L38.3403 68.0065C38.3075 68.2626 38.0176 70.707 38.0176 74.6647C38.0176 79.2136 38.4011 83.8418 39.1681 88.4001C39.2943 89.1497 39.9304 89.6945 40.6834 89.6945C40.7769 89.6945 40.8564 89.6851 40.9406 89.6758C41.3568 89.6013 41.7029 89.3778 41.9508 89.0473C42.1893 88.7074 42.2828 88.307 42.222 87.8972C41.4878 83.4972 41.1183 79.0507 41.1183 74.66C41.1183 70.7675 41.4176 68.4023 41.4176 68.3836L41.5065 67.62L41.6655 66.8704C42.3015 63.6391 43.4614 60.608 45.0702 57.8563C49.1203 50.942 55.8923 46.2254 63.6277 44.9217Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M41.3382 91.6874C40.936 91.7805 40.5946 92.0273 40.3795 92.3811C40.1644 92.7257 40.0942 93.1401 40.1831 93.5405C42.1847 102.066 45.4772 109.832 49.995 116.635C51.2156 118.464 52.5345 120.252 53.9422 121.956C58.287 127.218 65.2507 133.187 73.5614 138.765C73.8186 138.933 74.118 139.026 74.4266 139.026C74.9457 139.026 75.4181 138.779 75.7034 138.346C76.1804 137.647 75.998 136.679 75.2825 136.209C67.3366 130.873 60.4196 124.964 56.3321 119.992C54.9945 118.367 53.7318 116.672 52.5766 114.926C48.2599 108.44 45.1077 101 43.1996 92.8328C43.0079 92.0226 42.1614 91.4918 41.3382 91.6874Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M127.934 105.67C124.492 104.985 107.674 101.46 96.6324 89.1777C93.1669 85.3179 91.5487 80.8108 91.5487 74.9907C91.5487 74.255 91.5768 73.4914 91.6282 72.7185L91.689 71.7873L91.6422 70.8654C91.1184 60.4219 82.9153 49.103 68.7446 48.6746C68.5248 48.6699 68.3003 48.6653 68.0805 48.6653C57.1508 48.6653 47.9515 56.4782 45.702 67.676L45.5056 68.8726C45.4588 69.2777 45.2109 71.4707 45.2109 74.8743C45.2109 84.2749 47.0723 102.303 59.5173 117.389C67.4351 126.98 84.7907 140.073 105.13 146.787C105.289 146.834 105.453 146.862 105.617 146.862C106.262 146.862 106.865 146.452 107.085 145.805C107.356 144.995 106.912 144.124 106.103 143.854C87.0309 137.568 69.6566 124.82 61.9165 115.433C50.0795 101.088 48.3117 83.8605 48.3117 74.8743C48.3117 71.5731 48.5549 69.4733 48.5876 69.2451L48.7419 68.2766C50.6968 58.5455 58.6521 51.7429 68.0852 51.7429C68.2769 51.7429 68.4687 51.7476 68.6558 51.7569C80.9744 52.1247 88.1019 61.9584 88.5602 71.0191L88.5976 71.764L88.5509 72.5183C88.4948 73.3564 88.4667 74.1945 88.4667 74.9954C88.4667 81.5278 90.3842 86.8404 94.3361 91.2357C106.033 104.249 123.73 107.979 127.34 108.696C128.177 108.868 128.991 108.323 129.16 107.485C129.319 106.647 128.771 105.837 127.934 105.67Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M61.4349 106.307C61.7062 106.307 61.9634 106.247 62.2019 106.112C62.6883 105.842 62.9829 105.334 62.9829 104.775C62.9829 104.51 62.9128 104.245 62.7865 104.021L62.7023 103.886C57.6139 94.8767 56.0566 85.4947 55.6544 79.2043C55.5936 78.3569 54.8733 77.7051 54.0035 77.7656C53.5872 77.7889 53.2178 77.9705 52.9371 78.2918C52.6659 78.5991 52.5349 78.9902 52.5583 79.3999C53.0026 86.0488 54.6535 95.9848 60.088 105.534C60.3592 106.014 60.8784 106.307 61.4349 106.307Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M84.4537 71.7221L84.4303 71.2192C84.2012 66.9217 81.8207 60.799 75.8624 57.684C75.1281 57.2929 74.1554 57.6002 73.7766 58.3312C73.6643 58.5547 73.5988 58.7922 73.5988 59.0296C73.5895 59.6163 73.9075 60.1471 74.4313 60.4172C78.9538 62.7172 81.1566 67.5782 81.3249 71.3682L81.3483 71.6988L81.3249 72.0294C81.2548 73.0258 81.222 74.0222 81.222 74.9581C81.222 77.8634 81.5307 80.6245 82.148 83.1853C82.3117 83.8837 82.9337 84.368 83.6493 84.368C83.7709 84.368 83.8972 84.354 84.0094 84.3261C84.8419 84.1305 85.3563 83.2878 85.1552 82.4683C84.594 80.1449 84.3181 77.6167 84.3181 74.9581C84.3181 74.0594 84.3508 73.1422 84.4069 72.2343L84.4537 71.7221Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M88.9383 96.0222C92.8294 100.357 97.6933 104.203 103.376 107.458C103.614 107.588 103.885 107.662 104.152 107.662C104.694 107.662 105.214 107.364 105.49 106.889C105.695 106.536 105.751 106.121 105.644 105.721C105.532 105.32 105.274 104.99 104.924 104.79C99.5126 101.698 94.9106 98.0569 91.244 93.9782C89.3265 91.8411 87.8486 89.5922 86.7355 87.1058C86.7262 87.0919 86.7262 87.0733 86.7122 87.0593L86.6186 86.8451V86.8777C86.2258 86.2538 85.3699 85.9744 84.6684 86.2817C84.1119 86.5285 83.7471 87.0733 83.7471 87.6832C83.7471 87.8974 83.7892 88.1162 83.8827 88.3071V88.3164C85.1221 91.0775 86.8244 93.6709 88.9383 96.0222Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M65.1059 112.821C68.9643 117.496 75.4604 122.883 83.3782 127.977C83.6261 128.144 83.9114 128.223 84.2154 128.223C84.7438 128.223 85.2255 127.958 85.5155 127.516C85.6792 127.269 85.7634 126.985 85.7634 126.692C85.7634 126.161 85.5062 125.677 85.0525 125.388C77.607 120.611 71.0548 115.177 67.4958 110.866C66.7849 109.981 66.0881 109.087 65.4614 108.202C64.9843 107.532 63.9695 107.369 63.3054 107.848C62.6132 108.342 62.4448 109.306 62.9406 109.995C63.6234 110.963 64.3577 111.909 65.1059 112.821Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M53.9746 75.7077C54.807 75.7077 55.5086 75.014 55.5226 74.1852C55.5647 71.7221 55.7471 70.1903 55.7611 70.1298L55.8219 69.6874C57.108 63.3691 62.145 58.9412 68.0845 58.9412C68.1967 58.9412 68.309 58.9412 68.4353 58.9505C68.9684 58.9598 69.5203 59.0017 70.0581 59.0716C70.8952 59.188 71.681 58.5781 71.7885 57.7493C71.84 57.3349 71.7277 56.9345 71.4798 56.6085C71.2226 56.278 70.8625 56.0731 70.451 56.0219C69.8523 55.9381 69.1976 55.8868 68.5288 55.8682C68.3885 55.8543 68.2435 55.8542 68.0845 55.8542C64.4693 55.8542 60.9617 57.1812 58.1977 59.5838C55.4524 61.977 53.5303 65.348 52.7867 69.0868L52.6838 69.734C52.6604 69.9109 52.4686 71.5126 52.4219 74.134V74.1712C52.4359 75.0047 53.114 75.6798 53.9512 75.7031H53.9746V75.7077Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M111.78 137.829L111.747 137.82C104.077 135.617 97.5019 132.819 89.3923 128.061C88.6814 127.637 87.69 127.898 87.2737 128.605C87.0539 128.955 86.9931 129.374 87.1007 129.769C87.2036 130.17 87.4608 130.51 87.8209 130.715C96.1503 135.603 102.96 138.504 110.887 140.781C111.023 140.818 111.168 140.842 111.312 140.842C111.995 140.842 112.613 140.39 112.8 139.733C113.038 138.928 112.585 138.09 111.78 137.829Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M125.75 112.891C123.636 112.477 117.832 111.192 109.437 107.15C109.414 107.15 109.404 107.136 109.4 107.127H109.376C108.633 106.778 107.683 107.117 107.323 107.848C107.22 108.063 107.169 108.291 107.169 108.514C107.169 109.04 107.45 109.534 107.87 109.813H107.842L108.048 109.916C116.523 113.985 122.308 115.363 125.156 115.922C125.249 115.931 125.348 115.941 125.455 115.941C126.19 115.941 126.826 115.415 126.971 114.698C127.055 114.297 126.961 113.883 126.732 113.543C126.508 113.198 126.157 112.97 125.75 112.891Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M122.874 119.684C117.037 118.464 99.3447 113.771 85.8615 98.7692C80.0482 92.3019 77.1019 84.2749 77.1019 74.9255C77.1065 73.8918 77.1393 72.8256 77.2094 71.7594L77.2141 71.6709L77.2094 71.5824C77.0691 68.7236 75.0207 63.2574 68.3141 63.0525L68.0803 63.0479C64.7411 63.0479 60.9014 65.3479 59.8725 70.4976L59.8491 70.6093C59.8398 70.6791 59.6387 72.36 59.6387 75.1071C59.6387 82.4869 61.0698 96.6041 70.6806 108.254C78.533 117.766 97.4272 130.547 115.391 134.784C115.512 134.816 115.634 134.826 115.756 134.826C116.457 134.826 117.089 134.346 117.262 133.639C117.458 132.81 116.944 131.981 116.111 131.781C97.142 127.302 79.5899 114.185 73.0798 106.293C64.0816 95.3889 62.7347 82.0725 62.7347 75.1024C62.7347 72.8303 62.8844 71.331 62.9171 71.033C63.6748 67.4106 66.1675 66.1255 68.0803 66.1255H68.2159C73.4399 66.2838 74.0479 70.8328 74.1134 71.6476C74.0432 72.7511 74.0058 73.8499 74.0058 74.9162C74.0058 85.0524 77.2188 93.7639 83.5512 100.818C97.6564 116.518 116.163 121.426 122.233 122.697C123.075 122.878 123.893 122.334 124.066 121.505C124.249 120.676 123.711 119.861 122.874 119.684Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M119.717 126.114C118.791 125.868 116.916 125.272 115.985 124.992C115.166 124.741 114.301 125.197 114.053 126.012C113.801 126.827 114.264 127.688 115.078 127.939C116.041 128.228 117.944 128.833 118.908 129.094C119.044 129.131 119.179 129.145 119.31 129.145C119.993 129.145 120.62 128.689 120.802 128.005C121.031 127.185 120.545 126.338 119.717 126.114Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M75.7082 103.225C75.7082 103.225 75.7082 103.23 75.7082 103.225C76.3069 103.984 76.9289 104.729 77.5696 105.437C79.9782 108.1 83.8272 111.275 88.4104 114.386C88.677 114.567 88.981 114.656 89.2803 114.656C89.7761 114.656 90.2624 114.418 90.5618 113.976C91.0435 113.277 90.8564 112.318 90.1502 111.839C85.7634 108.863 82.1155 105.856 79.8659 103.374C79.2766 102.722 78.7061 102.038 78.1589 101.344C78.1589 101.344 78.1589 101.344 78.1542 101.344C77.3498 100.31 76.5922 99.2161 75.9 98.0987C75.451 97.3723 74.5016 97.1535 73.7674 97.5911C73.0425 98.0428 72.8133 98.9926 73.2623 99.7143C74.0199 100.925 74.8384 102.103 75.7082 103.225Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M98.83 117.147C98.816 117.137 98.7973 117.128 98.788 117.119C97.6047 116.462 96.4308 115.792 95.2991 115.117C94.5695 114.674 93.6154 114.912 93.1758 115.643C92.7315 116.374 92.9747 117.319 93.7043 117.761C94.8781 118.46 96.0988 119.163 97.3288 119.842C97.3428 119.847 97.3615 119.856 97.3709 119.866C102.347 122.608 104.779 123.875 109.839 125.779C110.022 125.844 110.199 125.877 110.386 125.877C111.008 125.877 111.598 125.5 111.832 124.88C112.136 124.084 111.733 123.195 110.929 122.892C106 121.039 103.689 119.824 98.83 117.147Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M70.3392 94.0248C70.5871 94.6161 71.1623 94.9653 71.7656 94.9653C71.9667 94.9653 72.1678 94.9327 72.3596 94.8489C73.15 94.523 73.5194 93.615 73.1921 92.8328C70.6619 86.8358 69.9838 81.1181 69.8575 77.384C69.8575 77.3793 69.8575 77.3793 69.8575 77.3793C69.8388 76.8811 69.8341 76.4295 69.8341 76.0151C69.8341 74.4413 69.9323 73.4962 69.9323 73.4915C70.0259 72.6487 69.4039 71.8851 68.5574 71.7967C67.7015 71.7036 66.9439 72.3182 66.855 73.1609C66.8503 73.2028 66.7334 74.2551 66.7334 76.0151C66.7334 76.4621 66.7428 76.951 66.7615 77.4864C66.7615 77.4911 66.7615 77.4911 66.7615 77.4911C66.9018 81.486 67.636 87.5947 70.3392 94.0248Z" fill="#FF3A1D"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M67.3316 10.6904C68.0004 10.6904 68.6692 10.6951 69.3333 10.7137C69.3567 10.7184 69.3754 10.7184 69.3941 10.7184C69.4596 10.7184 69.5297 10.7044 69.5952 10.6997C70.0114 10.7044 70.423 10.7044 70.8345 10.7137C70.8532 10.7184 70.8766 10.7184 70.8907 10.7184C71.8634 10.7184 72.6632 9.95012 72.6912 8.98166C72.7286 7.99457 71.9476 7.16113 70.9515 7.12854C70.2453 7.10526 69.5344 7.09595 68.8282 7.09595C68.7627 7.09595 68.6972 7.10992 68.6271 7.11923C68.1968 7.10992 67.7619 7.09595 67.3269 7.09595C66.3308 7.09595 65.5264 7.90145 65.5264 8.88853C65.5264 9.88028 66.3355 10.6811 67.3269 10.6811V10.6904H67.3316Z" fill="#FF3A1D"/>
        </g>
        <defs>
        <clipPath id="clip0_261_10116">
        <rect width="135.487" height="176.279" fill="white"/>
        </clipPath>
        </defs>
    </svg>';

    if (function_exists('acf_register_block_type')) {
        // Wrapper block
        acf_register_block_type(array(
            'name' => 'wrapper',
            'title' => __('Wrapper', 'buss'),
            'description' => __('Wrapper block', 'buss'),
            'render_callback' => 'buss_acf_block_render_callback',
            'category' => 'buss',
            'icon' => $icon,
            'supports' => array(
                'jsx' => true
            ),
            'keywords' => array('buss', 'wrapper'),
        ));

        // Companies block
        acf_register_block_type(array(
            'name' => 'companies',
            'title' => __('Companies', 'buss'),
            'description' => __('Companies block', 'buss'),
            'render_callback' => 'buss_acf_block_render_callback',
            'category' => 'buss',
            'icon' => $icon,
            'supports' => array(
                'jsx' => true
            ),
            'keywords' => array('buss', 'companies'),
        ));

        // Hero block
        acf_register_block_type(array(
            'name' => 'hero',
            'title' => __('Hero', 'buss'),
            'description' => __('Hero block', 'buss'),
            'render_callback' => 'buss_acf_block_render_callback',
            'category' => 'buss',
            'icon' => $icon,
            'supports' => array(
                'jsx' => true
            ),
            'keywords' => array('buss', 'hero'),
        ));

        // Booking block
        acf_register_block_type(array(
            'name' => 'booking',
            'title' => __('Booking system', 'buss'),
            'description' => __('Booking system block', 'buss'),
            'render_callback' => 'buss_acf_block_render_callback',
            'category' => 'buss',
            'icon' => $icon,
            'supports' => array(
                'jsx' => true,
                'mode' => true
            ),
            'mode' => 'edit',
            'keywords' => array('buss', 'booking'),
        ));

        // What will you business get block
        acf_register_block_type(array(
            'name' => 'business-get',
            'title' => __('What will you business get', 'buss'),
            'description' => __('What will you business get block', 'buss'),
            'render_callback' => 'buss_acf_block_render_callback',
            'category' => 'buss',
            'icon' => $icon,
            'supports' => array(
                'jsx' => true
            ),
            'keywords' => array('buss', 'business'),
        ));

        // Installation block
        acf_register_block_type(array(
            'name' => 'installation',
            'title' => __('Installation', 'buss'),
            'description' => __('Installation block', 'buss'),
            'render_callback' => 'buss_acf_block_render_callback',
            'category' => 'buss',
            'icon' => $icon,
            'supports' => array(
                'jsx' => true
            ),
            'keywords' => array('buss', 'installation'),
        ));

        // Integrations block
        acf_register_block_type(array(
            'name' => 'integrations',
            'title' => __('Integrations', 'buss'),
            'description' => __('Integrations block', 'buss'),
            'render_callback' => 'buss_acf_block_render_callback',
            'category' => 'buss',
            'icon' => $icon,
            'supports' => array(
                'jsx' => true
            ),
            'keywords' => array('buss', 'integrations'),
        ));

        // Steps block
        acf_register_block_type(array(
            'name' => 'steps',
            'title' => __('Steps', 'buss'),
            'description' => __('Steps block', 'buss'),
            'render_callback' => 'buss_acf_block_render_callback',
            'category' => 'buss',
            'icon' => $icon,
            'supports' => array(
                'jsx' => true
            ),
            'keywords' => array('buss', 'steps'),
        ));

        // Testimonials block
        acf_register_block_type(array(
            'name' => 'testimonials',
            'title' => __('Testimonials', 'buss'),
            'description' => __('Testimonials block', 'buss'),
            'render_callback' => 'buss_acf_block_render_callback',
            'category' => 'buss',
            'icon' => $icon,
            'supports' => array(
                'jsx' => true
            ),
            'keywords' => array('buss', 'testimonials'),
        ));

        // Services block
        acf_register_block_type(array(
            'name' => 'services',
            'title' => __('Services', 'buss'),
            'description' => __('Services block', 'buss'),
            'render_callback' => 'buss_acf_block_render_callback',
            'category' => 'buss',
            'icon' => $icon,
            'supports' => array(
                'jsx' => true
            ),
            'keywords' => array('buss', 'services'),
        ));

        // Calculator block
        acf_register_block_type(array(
            'name' => 'calculator',
            'title' => __('Calculator', 'buss'),
            'description' => __('Calculator block', 'buss'),
            'render_callback' => 'buss_acf_block_render_callback',
            'category' => 'buss',
            'icon' => $icon,
            'supports' => array(
                'jsx' => true
            ),
            'keywords' => array('buss', 'calculator'),
        ));

        // About block
        acf_register_block_type(array(
            'name' => 'about',
            'title' => __('About', 'buss'),
            'description' => __('About block', 'buss'),
            'render_callback' => 'buss_acf_block_render_callback',
            'category' => 'buss',
            'icon' => $icon,
            'supports' => array(
                'jsx' => true
            ),
            'keywords' => array('buss', 'about'),
        ));
    }

}

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function buss_acf_block_render_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
//    var_dump($block);
    Timber::render( "views/blocks/" . str_replace('acf/', '', $block["name"]) . ".twig", $context );
}

function my_acf_block_editor_style() {
//    wp_enqueue_style(
//        'example_block_css',
//        get_template_directory_uri() . '/assets/example-block.css'
//    );
}

add_action( 'enqueue_block_assets', 'my_acf_block_editor_style' );
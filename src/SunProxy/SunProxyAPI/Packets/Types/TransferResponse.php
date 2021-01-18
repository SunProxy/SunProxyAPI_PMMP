<?php

declare(strict_types=1);

namespace SunProxy\SunProxyAPI;

interface TransferResponse
{
    const TRANSFER_RESPONSE_SUCCESS = 0x00;
    const TRANSFER_RESPONSE_BAD_REQUEST = 0x01;
    const TRANSFER_RESPONSE_REMOTE_NOT_FOUND = 0x02;
    const TRANSFER_RESPONSE_REMOTE_REJECTION = 0x03;
}
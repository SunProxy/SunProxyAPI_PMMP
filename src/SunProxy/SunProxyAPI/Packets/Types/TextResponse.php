<?php

declare(strict_types=1);

namespace SunProxy\SunProxyAPI\Packet\Types;

interface TextResponse
{
    const TEXT_RESPONSE_SUCCESS = 0x00;
    const TEXT_RESPONSE_BAD_REQUEST = 0x01;
    //Unused as of now...
    const TEXT_RESPONSE_TARGETS_NOT_FOUND = 0x02;
}
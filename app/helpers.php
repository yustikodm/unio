<?php

use App\Models\Biodata;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @return int
 */
function getLoggedInUserId()
{
    return Auth::id();
}

/**
 * @return User
 */
function getLoggedInUser()
{
    return Auth::user();
}

/**
 * return avatar full url.
 *
 * @param  int  $userId
 * @param  string  $name
 *
 * @return string
 */
function getUserImageInitial($userId, $name)
{
    return getAvatarUrl() . "?name=$name&size=30&rounded=true&color=fff&background=" . getRandomColor($userId);
}

/**
 * return avatar url.
 *
 * @return string
 */
function getAvatarUrl()
{
    return 'https://ui-avatars.com/api/';
}

/**
 * Generate Unique key
 *
 * @return string
 */
function generateUniqueKey()
{
    return substr(md5(uniqid(rand(), true)), 0, 16);
}

/**
 * return random color.
 *
 * @param  int  $userId
 *
 * @return string
 */
function getRandomColor($userId)
{
    $colors = ['329af0', 'fc6369', 'ffaa2e', '42c9af', '7d68f0'];
    $index = $userId % 5;

    return $colors[$index];
}

function biodata($userId)
{
    return Biodata::findByUser($userId);
}

/**
 * File Upload Multi Field
 *
 * @param string $filename
 * @param array $fields (e.g. ['logo', 'header_img']
 * @param string $path
 * @return array[field_name]
 */
function upload($filename = 'default', $fields = [], $path = '')
{
    DB::beginTransaction();

    $output = [];

    try {
        foreach ($fields as $field) {
            $image = request()->file($field);

            if (!empty($image)) {
                $image_extension = '.' . $image->getClientOriginalExtension();
                $image_name = $field . '_' . Str::slug($filename) . '_' . time() . $image_extension;
                $image->storeAs('public/' . $path, $image_name);
                $output[$field] = $image_name;
            }
        }
    } catch (\Exception $error) {
        DB::rollBack();

        return 'Error! ' . $error->getMessage();
    }

    DB::commit();

    return $output;
}

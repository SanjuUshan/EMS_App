<?php

namespace App\Macros;

use App\Models\User;
use App\Helper\UserHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class FilesystemCustomMacros
{
    public function __invoke()
    {
        // profile images
        // retrieve
        Filesystem::macro('getEmptyImage', function () {
            return Storage::exists('public/users/empty.jpg') ? asset('storage/users/empty.jpg') : '#';
        });
        Filesystem::macro('getUserProfilePic', function (User $user) {
            $img = '#';
            if (!empty($user) && !empty($user->info->img)) {
                $filename = $user->info->img;
                $img = Storage::exists('public/users/profile/' . $filename) ? asset('storage/users/profile/' . $filename) : File::getEmptyImage();
            } else {
                $img = File::getEmptyImage();
            }
            return $img;
        });
        Filesystem::macro('getUserCompanyPic', function (User $user) {
            $img = '#';
            if (!empty($user) && !empty($user->company->logo)) {
                $filename = $user->company->logo;
                $img = Storage::exists('public/users/company/' . $filename) ? asset('storage/users/company/' . $filename) : File::getEmptyImage();
            } else {
                $img = File::getEmptyImage();
            }
            return $img;
        });
        Filesystem::macro('getUserReportPic', function (User $user) {
            $img = '#';
            if (!empty($user) && !empty($user->company->report_logo)) {
                $filename = $user->company->report_logo;
                $img = Storage::exists('public/users/company/report/' . $filename) ? asset('storage/users/company/report/' . $filename) : File::getEmptyImage();
            } else {
                $img = File::getEmptyImage();
            }
            return $img;
        });
        //delete
        Filesystem::macro('deleteUserProfilePic', function ($filename) {
            Storage::delete('public/users/profile/' . $filename);
        });
        Filesystem::macro('deleteUserCompanyPic', function ($filename) {
            Storage::delete('public/users/profile/' . $filename);
        });
        Filesystem::macro('deleteUserReportPic', function ($filename) {
            Storage::delete('public/users/profile/' . $filename);
        });
        //upload
        // Filesystem::macro('uploadUserProfilePic', function (User $user, UploadedFile $file, ?string $filename, ?string $oldFilename = '') {
        //     if (!empty($oldFilename) && Storage::exists('public/users/profile/' . $oldFilename)) File::deleteUserProfilePic($oldFilename); // delete old image
        //     $filename = empty($filename) ? UserHelper::generateUploadFileName($user, $file, 'profile') : $filename; // genereate new filename if name empty
        //     return $file->storePubliclyAs('public/users/profile', $filename); // upload file
        // });
        // Filesystem::macro('uploadUserCompanyPic', function (User $user, UploadedFile $file, ?string $filename, ?string $oldFilename = '') {
        //     if (!empty($oldFilename) && Storage::exists('public/users/company/' . $oldFilename)) File::deleteUserCompanyPic($oldFilename); // delete old image
        //     $filename = empty($filename) ? UserHelper::generateUploadFileName($user, $file, 'company') : $filename; // genereate new filename if name empty
        //     return $file->storePubliclyAs('public/users/company', $filename); // upload file
        // });
        // Filesystem::macro('uploadUserReportPic', function (User $user, UploadedFile $file, ?string $filename, ?string $oldFilename = '') {
        //     if (!empty($oldFilename) && Storage::exists('public/users/company/report/' . $oldFilename)) File::deleteUserReportPic($oldFilename); // delete old image
        //     $filename = empty($filename) ? UserHelper::generateUploadFileName($user, $file, 'report') : $filename; // genereate new filename if name empty
        //     return $file->storePubliclyAs('public/users/company/report', $filename); // upload file
        // });

        // mask Request Doc
        //upload
        // Filesystem::macro('uploadMaskRequestDoc', function (User $user, UploadedFile $file, ?string $filename, ?string $oldFilename = '') {
        //     if (!empty($oldFilename) && Storage::exists('public/users/profile/' . $oldFilename)) File::deleteUserProfilePic($oldFilename); // delete old image
        //     $filename = empty($filename) ? UserHelper::generateUploadFileName($user, $file, 'profile') : $filename; // genereate new filename if name empty
        //     return $file->storePubliclyAs('public/users/profile', $filename); // upload file
        // });
        // retrieve
        Filesystem::macro('getMaskRequestDoc', function (User $user) {
            $img = '#';
            if (!empty($user) && !empty($user->info->img)) {
                $filename = $user->info->img;
                $img = Storage::exists('public/users/profile/' . $filename) ? asset('storage/users/profile/' . $filename) : File::getEmptyImage();
            } else {
                $img = File::getEmptyImage();
            }
            return $img;
        });
        //delete
        Filesystem::macro('deleteMaskRequestDoc', function ($filename) {
            Storage::delete('public/users/profile/' . $filename);
        });
    }
}

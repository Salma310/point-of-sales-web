<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\UserModel;
use App\Models\ProfilUserModel;
class FillMissingUserProfilesSeeder extends Seeder
{
    public function run()
    {
        // Mendapatkan semua user yang belum memiliki profil
        $users = UserModel::doesntHave('profil')->get();
        foreach ($users as $user) {
            // Membuat record profil untuk user yang belum memiliki profil
            ProfilUserModel::create([
                'user_id' => $user->user_id,
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'jenis_kelamin' => null,
                'agama' => null,
                'no_hp' => null,
                'alamat' => null,
            ]);
        }
    }
}
<?php

namespace App\Helpers;

class CategoryHelper {
    public static function getCategoryColor($categoryId) {
        $colors = [
            1 => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'badge' => 'bg-blue-500', 'name' => 'Patagonia'],
            2 => ['bg' => 'bg-purple-100', 'text' => 'text-purple-800', 'badge' => 'bg-purple-500', 'name' => 'Cuyo'],
            3 => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'badge' => 'bg-green-500', 'name' => 'Litoral'],
            4 => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'badge' => 'bg-yellow-500', 'name' => 'Pampeana'],
            5 => ['bg' => 'bg-orange-100', 'text' => 'text-orange-800', 'badge' => 'bg-orange-500', 'name' => 'Noroeste'],
            6 => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'badge' => 'bg-red-500', 'name' => 'Noreste'],
        ];
        
        return $colors[$categoryId] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'badge' => 'bg-gray-500'];
    }
}

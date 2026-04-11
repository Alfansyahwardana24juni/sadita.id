<?php

namespace App\Http\Controllers;

use App\Models\AdminKantor;
use App\Models\DokterHewan;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display the chat interface with all contacts
     *
     * @return \Illuminate\View\View
     */
    public function tampilchat()
    {
        // Get all veterinarians and office admins
        $dokterHewans = DokterHewan::all();
        $adminKantors = AdminKantor::all();
        
        // Pass the data to the view
        return view('chat', compact('dokterHewans', 'adminKantors'));
    }
    
    /**
     * Redirect to WhatsApp with the appropriate contact and message
     *
     * @param string $type The type of contact (dokter_hewan or admin_kantor)
     * @param int $id The ID of the contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToWhatsApp($type, $id)
    {
        // Get the contact and message based on the type
        if ($type == 'dokter_hewan') {
            $contact = DokterHewan::findOrFail($id);
            $message = $contact->default_message ?? 'Halo, saya ingin konsultasi dengan dokter hewan.';
            $phone = $contact->nomor_telepon;
        } elseif ($type == 'admin_kantor') {
            $contact = AdminKantor::findOrFail($id);
            $message = $contact->default_message ?? 'Halo, saya ingin berbicara dengan admin kantor.';
            $phone = $contact->nomor_telepon;
        } else {
            abort(404);
        }
        
        // Format phone number (remove '+' and any spaces)
        // For Indonesian numbers, ensure they start with the country code
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        // If the number doesn't start with country code, add Indonesian code
        if (substr($phone, 0, 2) != '62' && substr($phone, 0, 1) == '0') {
            $phone = '62' . substr($phone, 1);
        }
        
        // Encode message for URL
        $message = urlencode($message);
        
        // Redirect to WhatsApp
        return redirect()->away("https://wa.me/{$phone}?text={$message}");
    }
}
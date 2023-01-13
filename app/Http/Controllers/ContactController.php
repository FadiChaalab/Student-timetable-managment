<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function show()
    {
        $contacts = Contact::where('id_sender', '=', Auth::user()->id)->where('trash', '=', 0)->orWhere('id_reciever', '=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(8);
        if (Auth::user()->id_role == 1) {
            return view('admin.contact.index', compact('contacts'));
        } else if (Auth::user()->id_role == 2) {
            return view('student.contact.index', compact('contacts'));
        } else if (Auth::user()->id_role == 3) {
            return view('teacher.contact.index', compact('contacts'));
        } else {
            return view('errors.401');
        }
    }

    public function show_compose()
    {
        $contacts = Contact::with('sender', 'reciever')->where('trash', '=', 0)->where('id_sender', '=', Auth::user()->id)->orWhere('id_reciever', '=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(8);
        if (Auth::user()->id_role == 1) {
            return view('admin.contact.compose', compact('contacts'));
        } else if (Auth::user()->id_role == 2) {
            return view('student.contact.compose', compact('contacts'));
        } else if (Auth::user()->id_role == 3) {
            return view('teacher.contact.compose', compact('contacts'));
        } else {
            return view('errors.401');
        }
    }

    public function show_star()
    {
        $contacts = Contact::with('sender', 'reciever')->where('trash', '=', 0)->where('id_sender', '=', Auth::user()->id)->where('star', '=', 1)->orWhere('id_reciever', '=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(8);
        if (Auth::user()->id_role == 1) {
            return view('admin.contact.star', compact('contacts'));
        } else if (Auth::user()->id_role == 2) {
            return view('student.contact.star', compact('contacts'));
        } else if (Auth::user()->id_role == 3) {
            return view('teacher.contact.star', compact('contacts'));
        } else {
            return view('errors.401');
        }
    }

    public function show_important()
    {
        $contacts = Contact::with('sender', 'reciever')->where('trash', '=', 0)->where('id_sender', '=', Auth::user()->id)->where('important', '=', 1)->orWhere('id_reciever', '=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(8);
        if (Auth::user()->id_role == 1) {
            return view('admin.contact.important', compact('contacts'));
        } else if (Auth::user()->id_role == 2) {
            return view('student.contact.important', compact('contacts'));
        } else if (Auth::user()->id_role == 3) {
            return view('teacher.contact.important', compact('contacts'));
        } else {
            return view('errors.401');
        }
    }

    public function show_sent()
    {
        $contacts = Contact::with('sender', 'reciever')->where('trash', '=', 0)->where('id_sender', '=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(8);
        if (Auth::user()->id_role == 1) {
            return view('admin.contact.sent', compact('contacts'));
        } else if (Auth::user()->id_role == 2) {
            return view('student.contact.sent', compact('contacts'));
        } else if (Auth::user()->id_role == 3) {
            return view('teacher.contact.sent', compact('contacts'));
        } else {
            return view('errors.401');
        }
    }

    public function show_trash()
    {
        $contacts = Contact::with('sender', 'reciever')->where('id_sender', '=', Auth::user()->id)->where('trash', '=', 1)->orWhere('id_reciever', '=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(8);
        if (Auth::user()->id_role == 1) {
            return view('admin.contact.trash', compact('contacts'));
        } else if (Auth::user()->id_role == 2) {
            return view('student.contact.trash', compact('contacts'));
        } else if (Auth::user()->id_role == 3) {
            return view('teacher.contact.trash', compact('contacts'));
        } else {
            return view('errors.401');
        }
    }

    public function read($id)
    {
        $contacts = Contact::with('sender', 'reciever')->where('id_sender', '=', Auth::user()->id)->orWhere('id_reciever', '=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(8);
        $contact = Contact::find($id);

        if ($contact->read == 0) {
            $contact->read = 1;
            $contact->save();
        }
        if (Auth::user()->id_role == 1) {
            return view('admin.contact.read', compact('contacts', 'contact'));
        } else if (Auth::user()->id_role == 2) {
            return view('student.contact.read', compact('contacts', 'contact'));
        } else if (Auth::user()->id_role == 3) {
            return view('teacher.contact.read', compact('contacts', 'contact'));
        } else {
            return view('errors.401');
        }
    }


    public function add(Request $request)
    {
        $request->validate([
            'to' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        $data = $request->all();
        $contact = new Contact();
        $reciever = User::where('email', '=', $data['to'])->first();
        if (!$reciever) {
            Session::flash('error', 'No user with this email in our database');
            if (Auth::user()->id_role == 1) {
                return redirect("/admin/contact");
            } else if (Auth::user()->id_role == 2) {
                return redirect("/student/contact");
            } else if (Auth::user()->id_role == 3) {
                return redirect("/teacher/contact");
            } else {
                return view('errors.401');
            }
            return redirect("/admin/contact");
        }

        if ($reciever->email == Auth::user()->email) {
            Session::flash('error', 'Can\'t send email to yourself');
            if (Auth::user()->id_role == 1) {
                return redirect("/admin/contact");
            } else if (Auth::user()->id_role == 2) {
                return redirect("/student/contact");
            } else if (Auth::user()->id_role == 3) {
                return redirect("/teacher/contact");
            } else {
                return view('errors.401');
            }
            return redirect("/admin/contact");
        }

        $contact->to = $data['to'];
        $contact->subject = $data['subject'];
        $contact->message = $data['message'];
        $contact->from = Auth::user()->email;
        $contact->id_sender = Auth::user()->id;
        $contact->id_reciever = $reciever->id;
        $contact->save();
        Session::flash('success', 'Message was sent with success');
        if (Auth::user()->id_role == 1) {
            return redirect("/admin/contact");
        } else if (Auth::user()->id_role == 2) {
            return redirect("/student/contact");
        } else if (Auth::user()->id_role == 3) {
            return redirect("/teacher/contact");
        } else {
            return view('errors.401');
        }
    }

    public function star($id)
    {
        $contact = Contact::find($id);
        $contact->star = $contact->star == 0 ? 1 : 0;
        $contact->save();

        if (Auth::user()->id_role == 1) {
            return redirect("/admin/contact");
        } else if (Auth::user()->id_role == 2) {
            return redirect("/student/contact");
        } else if (Auth::user()->id_role == 3) {
            return redirect("/teacher/contact");
        } else {
            return view('errors.401');
        }
    }

    public function unread($id)
    {
        $contact = Contact::find($id);
        $contact->read = $contact->read == 0 ? 1 : 0;
        $contact->save();

        if (Auth::user()->id_role == 1) {
            return redirect("/admin/contact");
        } else if (Auth::user()->id_role == 2) {
            return redirect("/student/contact");
        } else if (Auth::user()->id_role == 3) {
            return redirect("/teacher/contact");
        } else {
            return view('errors.401');
        }
    }

    public function important($id)
    {
        $contact = Contact::find($id);
        $contact->important = $contact->important == 0 ? 1 : 0;
        $contact->save();

        if (Auth::user()->id_role == 1) {
            return redirect("/admin/contact");
        } else if (Auth::user()->id_role == 2) {
            return redirect("/student/contact");
        } else if (Auth::user()->id_role == 3) {
            return redirect("/teacher/contact");
        } else {
            return view('errors.401');
        }
    }

    public function trash($id)
    {
        $contact = Contact::find($id);
        $contact->trash = $contact->trash == 0 ? 1 : 0;
        $contact->save();

        if (Auth::user()->id_role == 1) {
            return redirect("/admin/contact");
        } else if (Auth::user()->id_role == 2) {
            return redirect("/student/contact");
        } else if (Auth::user()->id_role == 3) {
            return redirect("/teacher/contact");
        } else {
            return view('errors.401');
        }
    }


    public function delete()
    {
        Contact::with('sender', 'reciever')->where('trash', '=', 1)->where('id_sender', '=', Auth::user()->id)->delete();
        Session::flash('success', 'Record was successfully deleted');
        if (Auth::user()->id_role == 1) {
            return redirect("/admin/contact");
        } else if (Auth::user()->id_role == 2) {
            return redirect("/student/contact");
        } else if (Auth::user()->id_role == 3) {
            return redirect("/teacher/contact");
        } else {
            return view('errors.401');
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsStoreRequest;

class ContactsController extends Controller
{
/**
     * @OA\Get(
     *     path="/v1/notebook",
     *     operationId="getAllContacts",
     *     summary="Display all contacts",
     *     tags={"Contacts"},
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="The page number. NOT REQURED, CHECK API ANSWER BEFORE",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Contacts list not found",
     *     ),
     * )
     * 
     * 
     * Show all contacts in notebook
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllContacts()
    {
        return response()->json(Contacts::query()->paginate(3), 200);  
    }

    /**
     * @OA\Post(
     *     path="/v1/notebook",
     *     operationId="createContact",
     *     tags={"Contacts"},
     *     summary="Create a new contact",
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     *     @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="name",
     *                   description="User name",
     *                   type="string",
     *                   example="Vladislav"
     *               ),
     *               @OA\Property(
     *                   property="surname",
     *                   description="User surname",
     *                   type="string",
     *                   example="Ostryakov"
     *               ),
     *              @OA\Property(
     *                   property="middle_name",
     *                   description="User middle name",
     *                   type="string",
     *                   example="Pavlovich"
     *               ),
     *              @OA\Property(
     *                   property="company",
     *                   description="Company name",
     *                   type="string",
     *                   example="Coca-cola"
     *               ),
     *              @OA\Property(
     *                   property="phone",
     *                   description="Phone number",
     *                   type="string",
     *                   example="79128539823"
     *               ),
     *              @OA\Property(
     *                   property="email",
     *                   description="User email",
     *                   type="string",
     *                   example="ostryakov2011@yandex.ru"
     *               ),
     *              @OA\Property(
     *                   property="birthday",
     *                   description="User birthday",
     *                   type="string",
     *                   example="2022-10-27"
     *               ),
     *              @OA\Property(
     *                   property="photo_path",
     *                   description="",
     *                   type="string",
     *                   example=""
     *               )
     *           )
     *       )
     *     )
     * )
     * 
     * Create a new note
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createContact(ContactsStoreRequest $request)
    {
        $item = new Contacts();
        $item->fill($request->all());
        $item->save();
        //return response()->json(Contacts::create($request->all()), 200);  
    }

/**
     * @OA\Get(
     *     path="/v1/notebook/{id}",
     *     operationId="getContactById",
     *     summary="Display contact by id",
     *     tags={"Contacts"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Contact id you need",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Contacts list not found",
     *     ),
     * )
     *
     * 
     * Display note by id
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function getContactById($id)
    {
        return response()->json(Contacts::find($id), 200);  
    }

/**
     * @OA\Put(
     *     path="/v1/notebook/{id}",
     *     operationId="updateContact",
     *     summary="Update contact by id",
     *     tags={"Contacts"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Contact id you need to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="name",
     *                   description="User name",
     *                   type="string",
     *                   example="Vladislav"
     *               ),
     *               @OA\Property(
     *                   property="surname",
     *                   description="User surname",
     *                   type="string",
     *                   example="Ostryakov"
     *               ),
     *              @OA\Property(
     *                   property="middle_name",
     *                   description="User middle name",
     *                   type="string",
     *                   example="Pavlovich"
     *               ),
     *              @OA\Property(
     *                   property="company",
     *                   description="Company name",
     *                   type="string",
     *                   example="Coca-cola"
     *               ),
     *              @OA\Property(
     *                   property="phone",
     *                   description="Phone number",
     *                   type="string",
     *                   example="79128539823"
     *               ),
     *              @OA\Property(
     *                   property="email",
     *                   description="User email",
     *                   type="string",
     *                   example="ostryakov2011@yandex.ru"
     *               ),
     *              @OA\Property(
     *                   property="birthday",
     *                   description="User birthday",
     *                   type="string",
     *                   example="2022-10-27"
     *               ),
     *              @OA\Property(
     *                   property="photo_path",
     *                   description="",
     *                   type="string",
     *                   example=""
     *               )
     *           )
     *       )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Contacts list not found",
     *     ),
     * )
     *
     * Update note by id
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateContact(Request $request, $id)
    {
        $contact = Contacts::find($id);
        $contact->update($request->all());
        return response()->json($contact, 200);  
    }

/**
     * @OA\Delete(
     *     path="/v1/notebook/{id}",
     *     operationId="deleteContact",
     *     summary="Delete contact by id",
     *     tags={"Contacts"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Contact id you need to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Contacts list not found",
     *     ),
     * )
     *
     * Delete the note from db
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteContact($id)
    {
        if (Contacts::destroy($id) != true) {
            return response()->json("Nothing to delete", 200);
        }
        return response()->json('Deleted!', 200);  
    }
}

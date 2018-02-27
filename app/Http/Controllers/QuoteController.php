<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;

class QuoteController extends Controller 
{
  public function postQuote(Request $request)
  {
    $quote = new Quote();
    $quote->content = $request->input('content');
    $quote->save();

    //return response()->json(['quote' => $quote], 201);
    return $quote;
  }

  public function getQuotes()
  {
    $quotes = Quote::all();
    // $response = [
    //   'quotes' => $quotes
    // ];
    // return response()->json($response, 200);
    return $quotes;
  }

  public function putQuote(Request $request, $id)
  {
    $quote = Quote::find($id);
    if (!$quote) {
      return response()->json(['message' => 'Document not found'], 404);
    }
    $quote->content = $request->input('content');
    $quote->save();
    return response()->json(['quote' => $quote], 200);

    // $quote = Quote::finOrFail($id);
    // return $quote;
  }

  public function deleteQuote(Request $request, $id)
  {
    $quote = Quote::find($id);
    if (!$quote) {
      return response()->json(['message' => 'Document not found'], 404);
    }
    $quote->delete();
    return response()->json(['message' => 'Quote deleted', 200]);

  }
}
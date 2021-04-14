<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateArticleAPIRequest;
use App\Http\Requests\API\UpdateArticleAPIRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ArticleResource;
use Response;

/**
 * Class ArticleController
 * @package App\Http\Controllers\API
 */

class ArticleAPIController extends AppBaseController
{
  /** @var  ArticleRepository */
  private $articleRepository;

  public function __construct(ArticleRepository $articleRepo)
  {
    $this->articleRepository = $articleRepo;
  }

  /**
   * Display a listing of the Article.
   * GET|HEAD /articles
   *
   * @return Response
   */
  public function index()
  {
    $articles = $this->articleRepository->paginate(15);

    return $this->sendResponse($articles, 'Articles retrieved successfully');
  }

  /**
   * Store a newly created Article in storage.
   * POST /articles
   *
   * @param CreateArticleAPIRequest $request
   *
   * @return Response
   */
  public function store(CreateArticleAPIRequest $request)
  {
    $input = $request->only([
      'title',
      'slug',
      'description',
      'user_id',
      'picture'
    ]);

    $article = $this->articleRepository->create($input);

    return $this->sendResponse(new ArticleResource($article), 'Article saved successfully');
  }

  /**
   * Display the specified Article.
   * GET|HEAD /articles/{id}
   *
   * @param int $id
   *
   * @return Response
   */
  public function show($id)
  {
    /** @var Article $article */
    $article = $this->articleRepository->find($id);

    if (empty($article)) {
      return $this->sendError('Article not found');
    }

    return $this->sendResponse(new ArticleResource($article), 'Article retrieved successfully');
  }

  /**
   * Update the specified Article in storage.
   * PWUT/PATCH /articles/{id}
   *
   * @param int $id
   * @param UpdateArticleAPIRequest $request
   *
   * @return Response
   */
  public function update($id, UpdateArticleAPIRequest $request)
  {
    $input = $request->only([
      'title',
      'slug',
      'description',
      'user_id',
      'picture'
    ]);

    /** @var Article $article */
    $article = $this->articleRepository->find($id);

    if (empty($article)) {
      return $this->sendError('Article not found');
    }

    $article = $this->articleRepository->update($input, $id);

    return $this->sendResponse(new ArticleResource($article), 'Article updated successfully');
  }

  /**
   * Remove the specified Article from storage.
   * DELETE /articles/{id}
   *
   * @param int $id
   *
   * @throws \Exception
   *
   * @return Response
   */
  public function destroy($id)
  {
    /** @var Article $article */
    $article = $this->articleRepository->find($id);

    if (empty($article)) {
      return $this->sendError('Article not found');
    }

    $article->delete();

    return $this->sendSuccess('Article deleted successfully');
  }
}

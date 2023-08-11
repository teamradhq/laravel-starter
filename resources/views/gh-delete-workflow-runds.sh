IDS=$(gh api \
  -H "Accept: application/vnd.github+json" \
  -H "X-GitHub-Api-Version: 2022-11-28" \
  /repos/teamradhq/laravel-starter/actions/workflows/laravel.test.yml/runs \
  | jq -r '.workflow_runs[] | .id')

while IFS= read -r ID; do
    echo "Processing: $ID"
    CONCLUSION=$(
      gh api \
          -H "Accept: application/vnd.github+json" \
          -H "X-GitHub-Api-Version: 2022-11-28" \
          "/repos/teamradhq/laravel-starter/actions/runs/$ID" \
       | jq -r '.conclusion'
    )

    if [ "$CONCLUSION" != "failure" ]; then
      continue
    fi

    echo "Deleting failed run $ID"
    gh api --method DELETE \
      -H "Accept: application/vnd.github+json" \
      -H "X-GitHub-Api-Version: 2022-11-28" \
      "/repos/teamradhq/laravel-starter/actions/runs/$ID"  > /dev/null 2>&1
done <<< "$IDS"

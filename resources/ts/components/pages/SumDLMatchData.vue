<template>
  <v-content>
    <v-container fluid>
      <h1 class="display-1 mb-4 text--darken-1">Sum DL Match Data</h1>
      <h4 class="subheading">マッチデータの一括ダウンロードが可能です。ダウンロードしたいデータにチェックを入れて一括ダウンロードボタンをクリックしてください。</h4>
      <v-form class="d-flex justify-md-space-center justify-sm-space-between">
        <v-text-field label="Solo" placeholder="keyword" solo></v-text-field>
        <v-select :items="items" v-model="itemDefault" solo></v-select>
        <v-btn class="primary">Search</v-btn>
      </v-form>
      <v-simple-table dense>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">
                <v-checkbox label="全チェック"></v-checkbox>
              </th>
              <th class="text-left">オーナー名</th>
              <th class="text-left">コメント</th>
              <th class="text-left">ファイル名</th>
              <th class="text-left">アップロード日時</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) in teams" :key="index">
              <td>
                <v-checkbox></v-checkbox>
              </td>
              <td>{{ item.name }}</td>
              <td style="white-space:pre-wrap; word-wrap:break-word;">{{ item.comments }}</td>
              <td>{{ item.file_name }}</td>
              <td>{{ item.date }}</td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
      <v-btn primary large block class="info">一括ダウンロード</v-btn>
      <v-pagination v-model="page" class="my-4" :length="15"></v-pagination>
    </v-container>
  </v-content>
</template>

<script lang="ts">
import { FileDataObject } from "../../vue-data-entity/FileDataObject";
import { SelectBoxTextValueObject } from "../../vue-data-entity/SelectBoxTextValueObject";

import { Vue, Component } from "vue-property-decorator";

@Component
export default class SumDLMatchData extends Vue {
  teams: Array<FileDataObject> = [
  ];
  page: Number = 1;
  items: Array<SelectBoxTextValueObject> = [
    {
      text: "投稿日時の新しい順",
      value: "1"
    },
    {
      text: "投稿日時の古い順",
      value: "2"
    }
  ];
  itemDefault: string = "1";
}
</script>
